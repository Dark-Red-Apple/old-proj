<?php

//$url = strtok($actual_link, '?');
$stripped_url = removeqsvar($actual_link, 'message');
echo $stripped_url;
function removeqsvar($url, $varname)
{
    list($urlpart, $qspart) = array_pad(explode('?', $url), 2, '');
    parse_str($qspart, $qsvars);
    unset($qsvars[$varname]);
    $newqs = http_build_query($qsvars);
    return $urlpart . '?' . $newqs;
}

?>
<script> window.onload = function () {
        history.pushState({}, "", '<?php echo $stripped_url ?>');
    };</script>
