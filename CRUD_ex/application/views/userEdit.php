<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
 
<title>SIMPLE CRUD APPLICATION</title>
 
<link href="<?php echo base_url(); ?>style/style.css" rel="stylesheet" type="text/css" />
 
<link href="<?php echo base_url(); ?>style/calendar.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url(); ?>script/calendar.js"></script>
 
</head>
<body>
    <div class="content">
        <h1><?php echo $title; ?></h1>
        <?php echo $message; ?>
        <form method="post" action="<?php echo $action; ?>">
        <div class="data">
        <table>
            <tr>
                <td width="30%">ID</td>
                <td><input type="text" name="id" disabled="disable" class="text" value="<?php echo $this->validation->id; ?>"/></td>
                <input type="hidden" name="id" value="<?php echo $this->validation->id; ?>"/>
            </tr>
            <tr>
                <td valign="top">Username<span style="color:red;">*</span></td>
                <td><input type="text" name="username" class="text" value="<?php echo $this->validation->username; ?>"/>
                <?php echo $this->validation->username_error; ?></td>
            </tr>
            <tr>
                <td valign="top">Password<span style="color:red;">*</span></td>
                <td><input type="text" name="password" class="text" value="<?php echo $this->validation->password; ?>"/>
                <?php echo $this->validation->password_error; ?></td>
            </tr>
            <tr>
                <td valign="top">Email<span style="color:red;">*</span></td>
                <td><input type="text" name="email" class="text" value="<?php echo $this->validation->email; ?>"/>
                <?php echo $this->validation->email_error; ?></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input type="submit" value="Save"/></td>
            </tr>
        </table>
        </div>
        </form>
        <br />
        <?php echo $link_back; ?>
    </div>
</body>
</html>