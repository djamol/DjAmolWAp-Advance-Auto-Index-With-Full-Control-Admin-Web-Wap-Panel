<?PHP
/*
	--------------------------------------------------------
              DjAmol Group INc.
	-------------------------------------------------------
                                          Twitter.com/djamol
	-------------------------------------------------------
*/

require_once("../../../moduls/config.php");
// Optional settings
//

$style = "dark"; // Counter Style "dark" or "light"
$show = "totally"; // Counter shows "totally"  or "last24h"  visitors
$size = "big"; // Size of the counter "small" or "big"

$reload=3*60*60; // Reload lock in seconds (3 * 60 * 60 => 3 hours)
$online=3*60; // online time in seconds (3 * 60 => 3 minutes)
$oldentries=30; // delete Visitor infos after x days (7 => 7 days)

//
// End of settings
//

// connect to database
$db_prefix = 'djamol_st_';
$serverID = @mysql_connect($SERVERmysql, $DB_USER, $DB_PASS);
if(!$serverID) {echo "The DB server is not reachable! Check Setting"; exit;}
$datenbank = @mysql_select_db($DB, $serverID);
if(!$datenbank) {echo "The database was not found!"; exit;}
?>