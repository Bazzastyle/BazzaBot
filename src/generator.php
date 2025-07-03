<?php
  function api() : object|string {
    $curl = curl_init();

    curl_setopt_array($curl, [
      CURLOPT_URL => 'https://raw.githubusercontent.com/davtur19/TuriBotGen/refs/heads/master/botapi.json',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_ENCODING => "",
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 30,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'GET',
      CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.13) Gecko/20080311 Firefox/2.0.0.13',
    ]);
    $response = curl_exec($curl);
    $err = curl_error($curl);
    curl_close($curl);

    if ($err) {
      return "cURL Error #:" . $err;
    }

    return json_decode($response);
  }

  function divideText($text, $type, $length = 100) {
    $parts = [];
    $currentPos = 0;
    $textLength = strlen($text);

    while ($currentPos < $textLength) {
      $endPos = $currentPos + $length;

      if ($endPos >= $textLength) {
        $parts[] = substr($text, $currentPos);
        break;
      }

      $nextSpacePos = strpos($text, ' ', $endPos);

      if ($nextSpacePos === false) {
        $parts[] = substr($text, $currentPos);
        break;
      }

      if ($nextSpacePos - $currentPos > $length) {
        $prevSpacePos = strrpos(substr($text, 0, $endPos), ' ');
        if ($prevSpacePos !== false && $prevSpacePos > $currentPos) {
          $nextSpacePos = $prevSpacePos;
        }
      }

      $parts[] = substr($text, $currentPos, $nextSpacePos - $currentPos);
      $currentPos = $nextSpacePos + 1;
    }

    if ($type == "function") return implode("\n     * ", $parts);
    elseif ($type == "param") return implode("\n     *                              ", $parts);
  }

  $types = "<?php

	namespace BazzaBot;

	use CURLFile;

	trait Types {";

  foreach ( api()->types as $type ) {
    $fields = [];

    $types .= "
    /**
     * " . divideText( str_replace( "\n", "\n     * ", $type->description ), "function" ) . "
     * 
     * @see https://core.telegram.org/bots/api#{$type->name}
     *";

    foreach ( $type->fields as $field ) {
      $typeField = "";
      foreach ( $field->types as $value ) {
        if ( $value === "InputFile" ) $typeField .= 'CURLFile|InputFile|';
        elseif ( !in_array ( $value, [ 'int', 'string', 'bool' ] ) ) $typeField .= 'array|';
        else $typeField .= "$value|";
      }

      $typeField = rtrim( $typeField, "|" );

      $optional = "";
      if ( $field->optional ) {
        $fields['optional'][$field->name]['type'] = $typeField;
        $optional = "|NULL";
      }
      else {
        preg_match( '@always “([a-z_]+)”@si', $field->description, $always );
        $fields['required'][$field->name]['type'] = $typeField;
        $fields['required'][$field->name]['deault'] = $always[1] ?? NULL;
      }

      $typeField = "";
      foreach ( $field->types as $value ) $typeField .= preg_replace( '/Array<([^>]+)>/', '$1[]', $value ) . '|';

      $types .= "\n     * @param " . rtrim( $typeField, "|" ) . "$optional $" . $field->name . " " . divideText( str_replace( "Optional. ", "", $field->description ), "param" );
    }

    $types .= "
     *
     * @return array $"."args
     */
    public function {$type->name} ( ";

    $args = "";
    if ( !empty( $fields['required'] ) ) {
      foreach ( $fields['required'] as $key => $value ) {
        $always = $value['deault'] ? " = '{$value['deault']}'" : "";
        if ( $type->name === 'ChatAdministratorRights' ) $types .= "{$value['type']} $" . "$key = false, ";
        else $types .= "{$value['type']} $" . "$key$always, ";
        $args  .= "'$key' => $"."$key, ";
      }
    }

    $optionals = "";
    if ( !empty( $fields['optional'] ) ) {
      foreach ( $fields['optional'] as $key => $value ) {
        if ( preg_match( '@\|@si', $value['type'] ) ) $types .= "{$value['type']}|null $" . $key . " = NULL, ";
        else if ( preg_match( '@InlineQueryResult(Cached)?([a-z]+)@si', $type->name, $match ) && $key === 'type' ) {
          if ( $match[2] === 'Mpeg4Gif' ) $match[2] = 'mpeg4_gif';
          $types .= "?{$value['type']} $" . $key . " = '" . strtolower( $match[2] ) . "', ";
        }
        else $types .= "?{$value['type']} $" . $key . " = NULL, ";
        $optionals .= "\n      if ( $"."$key !== NULL ) $"."args['$key'] = $"."$key;";
      }
    }

    $types = rtrim( $types, ", " );
    $types .= " ) : array {";
    $args = rtrim( $args, ", " );

    if ( $args === "" && $optionals === "" ) $types .= "\n      return [];";
    elseif ( $args === "" && $optionals !== "" ) $types .= "
      $"."args = []; $optionals
      return $"."args;";
    elseif ( $optionals === "" ) $types .= "\n      return [ $args ];";
    else $types .= "
      $"."args = [ " . $args . " ]; $optionals
      return $"."args;";

    $types .="\n    }\n";
  }

  $types .= "\n  }";

  $file = fopen( "Types.php", "w" );
  if ( $file ) {
    fwrite( $file, $types );
    fclose( $file);
    echo "File Types scritto correttamente\n";
  }
  else echo "Errore nell'apertura del file Types\n";

  $methods = "<?php

	namespace BazzaBot;

	use CURLFile;
	use stdClass;

	abstract class Api implements ApiInterface {";

  foreach ( api()->methods as $method ) {
    $fields = [];

    $methods .= "
    /**
     * " . divideText( str_replace( "\n", "\n     * ", $method->description ), "function" ) . "
     * 
     * @see https://core.telegram.org/bots/api#{$method->name}
     *";

    foreach ( $method->fields as $field ) {
      $typeField = "";
      foreach ( $field->types as $value ) {
        if ( $value === "InputFile" ) $typeField .= 'CURLFile|InputFile|';
        elseif ( !in_array( $value, [ 'int', 'string', 'bool' ] ) ) $typeField .= 'array|';
        else $typeField .= "$value|";
      }

      if ( strpos( $typeField, 'array|array' ) !== false ) $typeField = "array";

      $typeField = rtrim( $typeField, "|" );

      $optional = "";
      if ( $field->optional ) {
        $fields['optional'][$field->name] = $typeField;
        $optional = "|NULL";
      }
      else $fields['required'][$field->name] = $typeField;

      $typeField = "";
      foreach ( $field->types as $value ) $typeField .= preg_replace( '/Array<([^>]+)>/', '$1[]', $value ) . '|';

      $methods .= "\n     * @param " . rtrim( $typeField, "|" ) . "$optional $" . $field->name . " " . divideText( str_replace( "Optional. ", "", $field->description ), "param" );
    }

    $methods .= "
     *
     * @return stdClass
     */
    public function {$method->name} ( ";

    $args = "";
    if ( !empty( $fields['required'] ) ) {
      foreach ( $fields['required'] as $key => $value ) {
        $isArray  = $value === 'array' ? "json_encode( $"."$key )" : "$"."$key";
        $methods .= "$value $" . "$key, ";
        $args    .= "'$key' => $isArray, ";
      }
    }

    $optionals = "";
    if ( !empty( $fields['optional'] ) ) {
      foreach ( $fields['optional'] as $key => $value ) {
        $isArray    = $value === 'array' ? "json_encode( $"."$key );" : "$"."$key;";
        if ( preg_match( '@\|@si', $value ) ) $methods .= "$value|null $" . $key . " = NULL, ";
        else $methods .= "?$value $" . $key . " = NULL, ";
        $optionals .= "\n      if ( $"."$key !== NULL ) $"."args['$key'] = $isArray";
      }
    }

    $methods = rtrim($methods, ", ");
    $methods .= " ) : stdClass {";
    $args = rtrim($args, ", ");

    if ( $args === "" && $optionals === "" ) $methods .= "\n      return $"."this->Request( __FUNCTION__, [] );";
    elseif ( $args === "" && $optionals !== "" ) $methods .= "
      $"."args = []; $optionals
      return $"."this->Request( __FUNCTION__, $"."args );";
    elseif ( $optionals === "" ) $methods .= "\n      return $"."this->Request( __FUNCTION__, [ $args ] );";
    else $methods .= "
      $"."args = [ $args ]; $optionals
      return $"."this->Request( __FUNCTION__, $"."args );";

    $methods .="\n    }\n";
  }

  $methods .= "\n  }";

  $file = fopen( "Api.php", "w" );
  if ( $file ) {
    fwrite( $file, $methods );
    fclose( $file);
    echo "File Api scritto correttamente\n";
  }
  else echo "Errore nell'apertura del file Api\n";
