<?php
/** Memcached tester
 *
 * a tool finds global memcached server and make a list
 *
 * useage:
 *	edit the first line in the "thread" function
 *		LengthMemcachedStats is for testing server responding
 *		MemcachedTester is for a full test includs connecting, write random bytes, and request single key using UDP method.
 *		a detailed log will output to ./log
 *
 * @author Layer4
 * @mod arily
 *
 */
function thread($ip, $output, $responselength) {
	//stats,Tester
	$len = LengthMemcachedUDPStat($ip, TEST_TIMEOUT);
	if ($len >= $responselength) {
		addentry($output, $ip);
		print($ip . " " . $len . " [x" . round($len / STAT_QUERY_LENGTH, 2) . "]\n");
	}
}
include __DIR__ . "/libmemc.php";
include __DIR__ . "/libtest.php";
include __DIR__ . "/thread.php";