<?php 

/*
 * Define the protocol tables & standard settings
 */


define('PROTOCOL_ANCFIRST','protocol.ancfirst');
define('PROTOCOL_ANCFOLLOW','protocol.ancfollow');
define('PROTOCOL_ANCLABTEST','protocol.anclabtest');
define('PROTOCOL_ANCTRANSFER','protocol.anctransfer');
define('PROTOCOL_DELIVERY','protocol.delivery');
define('PROTOCOL_REGISTRATION','protocol.registration');
define('PROTOCOL_PNC','protocol.pnc');

define('TABLE_REGISTRATION','REGISTRATION_FORMV6_CORE');
define('TABLE_REG_HOMEAPPLIANCES','REGISTRATION_FORMV6_Q_HOMEAPPLIANCES');

define('TABLE_ANCFIRST','ANCFIRST_VISITV7_CORE');
define('TABLE_ANCFIRST_FPMETHOD','ANCFIRST_VISITV7_Q_FPMETHOD');
define('TABLE_ANCFIRST_ATTENDED','ANCFIRST_VISITV7_Q_WHOATTENDED');

define('TABLE_ANCFOLLOW','ANCFOLLOW_UPV6_CORE');

define('TABLE_ANCTRANSFER','ANCTRANSFERV7_CORE');
define('TABLE_ANCTRANSFER_FPMETHOD','ANCTRANSFERV7_Q_FPMETHOD');
define('TABLE_ANCTRANSFER_ATTENDED','ANCTRANSFERV7_Q_WHOATTENDED');

define('TABLE_ANCLABTEST','ANCLAB_TESTV5_CORE');

define('TABLE_DELIVERY','DELIVERYV2_CORE');
define('TABLE_DELIVERY_ATTENDED','DELIVERYV2_Q_BIRTHATTENDANT');
define('TABLE_DELIVERY_BABY','DELIVERYV2_Q_DELIVERIES');

define('TABLE_PNC','PNCV1_CORE');
define('TABLE_PNC_ATTENDED','PNCV1_Q_BIRTHATTENDANT');
define('TABLE_PNC_BABY','PNCV1_Q_BABIES');
define('TABLE_PNC_COMPLICATIONS','PNCV1_Q_COMPLICATIONS');

define('DEFAULT_LIMIT',50);
define('DEFAULT_START',0);
define('DEFAULT_DAYS',7);

define("IGNORE_HEALTHPOINTS","9999");

?>