<?php
if( !defined( 'ABSPATH' ) )	exit;

require_once 'bootstrap.php';
$vqzb = new VQzBuilder();
$vqzb->load_models();
VQzBuilder_ActivationManager::uninstall();