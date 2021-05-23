<?php

namespace App\Core;

class Template
{
  private static function getTemplateFile(string $templateName): string|false
  {
    $filename = __DIR__ . "/../views/". $templateName .".php";
    $contents = file_get_contents($filename);
    return $contents;
  }

  /**
   * replaces {{ $key }} with $val in a $template string
   */
  private static function compileTemplate(string $template, array $key_val_array, array $tokenDelimeters = ['{{','}}']
  ): string {
    [$tokenStart, $tokenEnd] = $tokenDelimeters;
    return array_reduce_assoc(
      $key_val_array,
      function ($inProgressTemplate, $key, $val) use ($tokenStart, $tokenEnd) {
        return preg_replace("/$tokenStart\s*$key\s*$tokenEnd/m", $val, $inProgressTemplate);
      },
      $template
    );
  }

  /**
   * make a page from a template and key-value array
   */
  public static function make(string $templateName, array $key_val_array
  ): string
  {
    $template = self::getTemplateFile($templateName);

    if (!$template) {
      throw new \Exception("Cannot load template $templateName");
    }

    return self::compileTemplate($template, $key_val_array
  );
  }
}
