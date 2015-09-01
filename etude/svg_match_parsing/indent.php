<?php
// Parsing d'un xml de match pour en étudier les données

require 'cli/CliColor.class.php';


$dom = new DomDocument('1.0','utf-8');
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
$dom->load('files/test_match.xml');
$replay = $dom->childNodes->item(0);

$dom2 = new DomDocument('1.0','utf-8');
$dom->preserveWhiteSpace = false;
$dom2->formatOutput = true;
$dom2->appendChild(a($replay,$dom2));
// a($replay);
$dom2->save('files/test_match.svg1.xml',LIBXML_NOEMPTYTAG);

function a($_node,&$_dom_output,$_n = 0) {
    // Sous node incvalide
    if ("#text" == $_node->nodeName) {return false;}

    // print str_repeat("\t", $_n)."<".$_node->nodeName.">\n";
    print str_repeat("\t", $_n)."<".$_node->nodeName /* .' nbssnode="'.$_node->childNodes->length.'"' */ .'>'."\n";

    // $mnode = new DomElement($_node->nodeName);
    $mnode = $_dom_output->createElement($_node->nodeName);

    $i=0;
    foreach ($_node->childNodes as $ssnode) {
        $tmp = a($ssnode,$_dom_output,($_n+1));
        // print_r($tmp);
        if ($tmp) {$mnode->appendChild($tmp);}

        // Analyse step 1 seulement
        if (false && 0 == $_n && 1 == $i) { // Le premier #text est foireux
            // print str_repeat("\t", ($_n+1))."<break/>\n";
            break;
        }
        $i++;
    }
    // print '{nodeValue:'.$_node->nodeValue.'}';
    if ($mnode->childNodes->length == 0) {
        $mnode->nodeValue = $_node->nodeValue;
        print $_node->nodeValue;

    }
    print str_repeat("\t", $_n)."</".$_node->nodeName.">\n";

    if (is_null($mnode->nodeValue) || '' == $mnode->nodeValue) {return false;}

    return $mnode;
}

