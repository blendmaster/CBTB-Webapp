<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<?php include "includes/headmatter.inc.php" ?>
	<title>Compassion by the Book -- User Privelege Management</title>
	<meta name="description" content="">
	<meta name="author" content="">
</head>
<body>

<div id="container">
	<?php include "includes/header.inc.php" ?>
	<div id="main" role="main">
    <form>
      <table>
        <tr>
          <th></th>
          <th>Username</th>
          <th>Role</th>
        </tr>
        <tr>
          <td><input type="checkbox" value="userAlpha"/></td>
          <td>Alpha</td>
          <td>Super Administrator</td>
        </tr>
        <tr>
          <td><input type="checkbox" value="userBeta"/></td>
          <td>Beta</td>
          <td>Chapter Administrator</td>
        </tr>
        <tr>
          <td><input type="checkbox" value="userGamma"/></td>
          <td>Gamma</td>
          <td>Project Administrator</td>
        </tr>
        <tr>
          <td><input type="checkbox" value="userDelta"/></td>
          <td>Delta</td>
          <td>User</td>
        </tr>
      </table>
      <label for="changeRole">Change the selected user(s) role to:</label><select name="changeRole" id="changeRole">
      	<option value="superAdmin">Super Administrator</option>
        <option value="chapterAdmin">Chapter Administrator</option>
        <option value="projectAdmin">Project Administrator</option>
        <option value="user">User</option>
      </select>
    </form>
	</div>
	<?php include "includes/footer.inc.php" ?>
</div> <!--! end of #container -->
<?php include "includes/scripts.inc.php" ?>
</body>
</html>
