<?php
use App\Models\Setting;

function getImageFile($file)
{
    if ($file != '') {
        return asset($file);
    } else {
        return asset('frontend/assets/img/no-image.png');
    }
}
function get_option($option_key, $default = NULL)
{
    $system_settings = config('settings');
    if ($option_key && isset($system_settings[$option_key])) {
        return $system_settings[$option_key];
    } elseif ($option_key && isset($system_settings[strtolower($option_key)])) {
        return $system_settings[strtolower($option_key)];
    } elseif ($option_key && isset($system_settings[strtoupper($option_key)])) {
        return $system_settings[strtoupper($option_key)];
    } else {
        return $default;
    }
}
if (!function_exists('updateManifest')) {
  function updateManifest()
  {
      $manifest = [
          "name" => get_option('app_name', 'DevTechMasters'),
          "short_name" => get_option('app_name', 'DevTechMasters'),
          "description" => get_option('app_name', 'DevTechMasters'),
          "display" => "fullscreen",
          "icons" => [
              [
                  "src" => getImageFile(get_option('app_pwa_icon')),
                  "sizes" => "512x512",
                  "type" => "image/png",
                  "purpose" => "any maskable"
              ]
          ]
      ];

      file_put_contents(public_path("manifest.json"), json_encode($manifest));
  }
}
