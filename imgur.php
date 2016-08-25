<?php
if( !defined( 'MEDIAWIKI' ) ) {
    echo( "This is an extension to the MediaWiki package and cannot be run standalone.\n" );
    die( -1 );
}
$wgExtensionCredits['validextensionclass'][] = array(
    'path'           => __FILE__,
    'name'           => 'Imgur',
    'version'        => '1.0',
    'author'         => 'ldkrsi',
    'url'            => 'https://github.com/ldkrsi/mediawiki_imgur',
    'description'    => 'Allows Imgur uploaded images to be displayed on the wiki'
);

$wgHooks['ParserFirstCallInit'][] = 'wfImgurInit';

function wfImgurInit( Parser $parser ) {
    $parser->setHook( 'imgur', 'wfImgurRender' );
    return true;
}

function wfImgurRender( $input, array $args, Parser $parser, PPFrame $frame ) {
    $args['width'] = isset($args['width']) ? htmlspecialchars($args['width']):'320';
    $float_right = isset($args['float']) && strtolower($args["float"]) == 'right';
    $args['comment'] = isset($args['comment']) ? htmlspecialchars($args['comment']):'';
    $input = htmlspecialchars($input);
    return '<div style="'.(!$float_right ? '':'margin-left:15px;float:right;clear:right;').'max-width:'.$args['width'].'px;width:100%;background-color:#f9f9f9;padding:3px;border:1px solid #ccc;box-sizing:border-box;"><a href="https://imgur.com/'.$input.'"><img src="https://i.imgur.com/'.$input.'.png" style="width:100%;"></a><div style="line-height:1.4;font-size:14px;">'.$args['comment'].'</div></div>';
}
?>