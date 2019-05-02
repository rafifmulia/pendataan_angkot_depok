<!DOCTYPE html>
<html>
<head>
    <?php echo $page['head'] ?>
    <style type="text/css">
    <?php if (!empty($css_inside)) { echo $css_inside; } ?>
    </style>
</head>
<body class="hold-transition skin-blue sidebar-mini">

<div class="wrapper">
    <?php echo $page['navtop'] ?>
    <?php echo $page['navside'] ?>
    <?php echo $content ?>
    <?php echo $page['footer'] ?>
    <?php echo $page['control_sidebar'] ?>
</div>

<?php echo $page['main_js'] ?>

<script type="text/javascript">
    <?php if (!empty($js_inside)) { echo $js_inside; } ?>
</script>
</body>
</html>