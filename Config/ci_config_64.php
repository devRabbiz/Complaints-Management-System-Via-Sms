<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
// db_name info
define('HOSTNAME', "localhost");
define('SQLUSER_NAME', "root");
define('USER_PASSWORD', "");
define('DATABASE_NAME', "db_gallery_picture");

// hosting root info
// URL_ROOT_NEWS_WEB
define('URL_ROOT_NEWS_WEB', 'http://10.0.0.64/NewsApp/news_ur/');
// URL_ROOT_NEWS_API
define('URL_ROOT_NEWS_API', 'http://10.0.0.64/NewsApp/api_ur/');
// URL_ROOT_GALLERY_API
define('URL_ROOT_GALLERY_API', 'http://10.0.0.64/NewsApp/gallery_api/');
// URL_ROOT_VIDEO_API
define('URL_ROOT_VIDEO_API', 'http://10.0.0.64/NewsApp/video_api/');



// ==================================
// USE THIS FOR ALL CONTROLLERS
// CONTROLLER_NAME CATEGORY
define('CONTROLLER_NAME_CATEGORY', 'index.php/category/');
// CONTROLLER_NAME NEWS
define('CONTROLLER_NAME_NEWS', 'index.php/news/');
// CONTROLLER_NAME GALLERIES
define('CONTROLLER_NAME_GALLERY', 'index.php/gallery/');
// CONTROLLER_NAME PICTURE
define('CONTROLLER_NAME_PICTURE', 'index.php/picture/');
// CONTROLLER_NAME CONTACT
define('CONTROLLER_NAME_CONTACT', 'index.php/contact/');
// CONTROLLER_NAME VIDEO
define('CONTROLLER_NAME_VIDEO', 'index.php/video/');
// ==================================



// ==================================
// USE THIS FOR ALL API
// CONTROLLER_NAME_API
define('CONTROLLER_NAME_API', 'index.php/service/');
// ==================================
// URL_AUDIO_PATH
define('URL_AUDIO_PATH','http://10.0.0.64/NewsApp/news_ur/assets/placeholders/audio/adg3com_chuckedknuckles.wav');
// ==================================


// ==================================
// NEWS INFO
// ========================================================
// ============= NEWS All CONTROLLER FULL URLS=============
// ========================================================
// URL_FULL_NEWS
define('URL_FULL_NEWS_CONTROLLER',URL_ROOT_NEWS_WEB.CONTROLLER_NAME_NEWS);
// ==================================
// ==================================
// GALLERY INFO
define('URL_FULL_GALLERY_CONTROLLER',URL_ROOT_NEWS_WEB.CONTROLLER_NAME_GALLERY);
// ==================================
// ==================================
// CONTACT INFO
define('URL_FULL_CONTACT_CONTROLLER',URL_ROOT_NEWS_WEB.CONTROLLER_NAME_CONTACT);
// ==================================
// ==================================
// VIDEO INFO
define('URL_FULL_VIDEO_CONTROLLER',URL_ROOT_NEWS_WEB.CONTROLLER_NAME_VIDEO);
// ========================================================
// ============= NEWS All CONTROLLER FULL URLS=============
// ========================================================
//*********************************************************
// ========================================================
// =============All API FULL URLS==========================
// ========================================================
// API-EN INFO
define('URL_FULL_NEWS_API_CONTROLLER',URL_ROOT_NEWS_API.CONTROLLER_NAME_API);
// ==================================
// GALLERY-API-EN info
define('URL_FULL_GALLERY_API_CONTROLLER',URL_ROOT_GALLERY_API.CONTROLLER_NAME_API);
// ==================================
// URL_FULL_VIDEO_API
define('URL_FULL_VIDEO_API_CONTROLLER',URL_ROOT_VIDEO_API.CONTROLLER_NAME_API);
// ========================================================
// =============All API FULL URLS==========================
// ========================================================


// LANGUAGE PORTAL LINKS
 // ONE LANG
// ==================================
define('TEXT_LANGUAGE_ONE','ENGLISH');
define('URL_LANGUAGE_ONE','');
 // TWO LANG
define('TEXT_LANGUAGE_TWO','اردو');
define('URL_LANGUAGE_TWO','');
 // THREE LANG
define('TEXT_LANGUAGE_THREE','');
define('URL_LANGUAGE_THREE','');
 // FOUR LANG
define('TEXT_LANGUAGE_FOUR','');
define('URL_LANGUAGE_FOUR','');
// ==================================


 /// SITE INFORMATION

 // CONTACT INFO
// ==================================
define('TEXT_CONTACT_HTML','');
// ==================================
 
 // ABOUT INFO
// ==================================
define('TEXT_ABOUT_HTML','');
// ==================================

// SOCAIL ICON AND LINKS
// ==================================
// FACE BOOK
define('URL_FACEBOOK_PAGE','https://www.facebook.com/Xorsat.Education');
// TWITTER
define('URL_TWITTER_PROFILE','https://twitter.com/xorsat');
// GOOGLE PLUS
define('URL_GOOGLE_PLUS_PROFILE','https://plus.google.com/+XorsatSolution/posts');
// YOUTUBE CHANNEL
define('URL_YOUTUBE_CHANNEL','');
// ==================================

// MOBILE APP 
// ==================================
// APP STORE IPHONE
define('URL_MOBILE_IPHONE','https://itunes.apple.com/en/genre/ios/id36?mt=8');
// APP STORE GOOGLE PLAY
define('URL_MOBILE_ANDROID','https://play.google.com/store/apps?hl=en');
// ==================================

// LOGO NAME
// ==================================
define('TEXT_LOGO','<h2>MY</h2><h2>News</h2>');

// SITE TITLE
// ==================================
define('TEXT_SITE_TITLE','My News');

// SITE COPY RIGHT
// ==================================
define('TEXT_SITE_COPYRIGHT','Copyrights &copy; 2013 by My News');

// TICKER NEWS LIMIT 
// ==================================
define('NUMBER_TICKER','');







// =================  AFTER  REMOVE 
define('HOME_FEATURE_VIDEO_ONE', 'http://10.0.0.64/NewsApp/video_api/videos/featured');
define('HOME_FEATURE_VIDEO_TWO', 'http://10.0.0.64/NewsApp/video_api/videos/featured');
define('HOME_FEATURE_VIDEO_THREE', 'http://10.0.0.64/NewsApp/video_api/videos/featured');




/// ============================================

//ADMIN-EN INFO
define('ADMIN_ROOT_URL', 'http://10.0.0.64/NewsApp/');
define('ADMIN_SOURCE_PATH', '/admin_ur/uploads/');
define('ADMIN_BIG_IMG', ADMIN_ROOT_URL.ADMIN_SOURCE_PATH.'big/');
define('ADMIN_SMALL_IMG', ADMIN_ROOT_URL.ADMIN_SOURCE_PATH.'small/');

//ADMIN-GALLERY INFO
define('ROOT_URL', 'http://10.0.0.64/NewsApp/');
define('SOURCE_PATH', '/admin_gallery/uploads/');
define('BIG_IMG', ROOT_URL.SOURCE_PATH.'big/');
define('SMALL_IMG', ROOT_URL.SOURCE_PATH.'small/');

		  
define('VIDEO_PATH',  str_replace("news_ur","video_api",URL_ROOT_NEWS_WEB));
define('API_EN',  str_replace("news_ur","api_ur",URL_ROOT_NEWS_WEB));
define('VIDEO_API',  str_replace("news_ur","video_api",URL_ROOT_NEWS_WEB));

   define('IMAGE_PATH_S',  str_replace("news_ur","admin_gallery",URL_ROOT_NEWS_WEB)."uploads/small/");
define('IMAGE_PATH_L',  str_replace("news_ur","admin_gallery",URL_ROOT_NEWS_WEB)."uploads/big/");

define('GALLERY_API',  str_replace("news_ur","gallery_api",URL_ROOT_NEWS_WEB));
/// ============================================




