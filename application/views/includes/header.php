<?php
/**
 * PataMarks - Login View
 *
 * PataMarks is a marks submission application using CodeIgniter 3
 *
 * @package     PataMarks
 * @author      Makhanu Sinja
 * @copyright   Copyright (c) 2016 - 2017 Makhanu Sinja(http://imakhs.com)
 * @license     BSD - http://www.opensource.org/licenses/BSD-3-Clause
 * @link        http://github.com/makhsinja/patamarks
 */
?>
<!DOCTYPE html>
<html lang="en" >
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" href="<?php echo base_url(); ?>resource/bootstrap-3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?php echo base_url(); ?>resource/ui-1.12.1/themes/south-street/jquery-ui.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>resource/css/animate.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>resource/css/normalize.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>resource/css/styl.css">
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif|Lobster|Open+Sans|Baumans" rel="stylesheet">
    <style>
        body {
            padding-top: 60px;
            padding-bottom: 40px;
        }
    </style>
	<title>Patamarks | <?php if(isset($title)){echo $title;} ?></title>
	<?php
		// Add any javascripts
		if( isset( $javascripts ) )
		{
			foreach( $javascripts as $js )
			{
				echo '<script src="' . $js . '"></script>' . "\n";
			}
		}

		if( isset( $final_head ) )
		{
			echo $final_head;
		}
	?>
</head>
<body>