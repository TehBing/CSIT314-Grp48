<?php
    require_once 'config.php';  // Get the configurable items
    session_start();
    if (isset($_SESSION['user_id'])) {
        // User is logged in, display the dashboard or property listings
        $userName = $_SESSION['user_name']; 
        $userRole = $_SESSION['user_role']; 
        $userId = $_SESSION['user_id']; 
        $userEmail = $_SESSION['user_email'];
}
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>Mortgage Calculator</title>
<link href="<?php echo URL; ?>/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!--[if lte IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo URL; ?>/css/ie7.css">
<![endif]-->
<script src="<?php echo URL; ?>/js/jquery-1.9.1.min.js"></script>
<script src="<?php echo URL; ?>/js/jquery.betterTooltip.js"></script>
<script src="<?php echo URL; ?>/js/scrolltable.js"></script>
<script src="<?php echo URL; ?>/js/modal.js"></script>
<script type="text/javascript">
    var layout = '<?php echo LAYOUT; ?>';   // Where is the table going to appear
    var siteUrl = '<?php echo URL; ?>';         // url for popup scripts

</script>
<script src="<?php echo URL; ?>/js/pageLoad.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>

<body>
  <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand mx-auto" href="index.php">
                <img src="../img/Logo.png" width="100" height="100" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../agent_page.php">Agents</a>
                    </li>
                    <li class="nav-item">
                                <a class="nav-link" href="../mortgageCalc/index.php">Mortgage Calculator</a>
                    </li>
                    <?php
                    // Additional options for agents
                    if (!empty($_SESSION['user_id'])) {

                        if ($userRole === 'agent') {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../insert_property.php">Add Property</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../update_property.php">Update Property</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../delete_property.php">Delete Property</a>
                            </li>
                            <?php
                        }

                        if ($userRole === 'admin') {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../List_user.php">Users</a>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../logout.php">Logout</a>
                        </li>
                        <?php
                    }else{
                        ?>            
                            <li class="nav-item">
                                <a class="nav-link" href="../login.php">Login</a> <!-- Display Login link -->
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../register.php">Register</a>
                            </li>
                        <?php
                    }
                    ?>                          
                </ul>
                <form class="form-inline my-2 my-lg-0" action="index.php" method="GET">
                    <div class="input-group">
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" name="search">
                        <div class="input-group-append">
                            <button class="btn btn-outline-success" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </nav>
    <!-- Navbar -->

  <div id="calcWrapper">
    <div class="formDiv">
      <h1>Mortgage Calculator</h1>
      <p>
        This calculator will show you the breakdown of your payments made towards a home loan.
      </p>

      <form class="inputF">
        <table id="selections">

        <?php if (ALLOWEMAIL == 'yes') { ?>
          <tr>
            <td>
              Send A PDF Report to your email?
            </td>
            <td>
              <input type="checkbox" class="sendEmail" />
            </td>
            <td class="emailTD" colspan="2">
              <input type="text" class="email" placeholder="Your Email"/>
            </td>
          </tr>
        <?php } ?>

          <tr>
            <td>
              Purchase Price: 
            </td>
            <td>
              <img src="<?php echo URL; ?>/css/images/information.png" class="tTip" id="info1" 
              title="The total purchase price of the home you wish to buy." alt="info"/>
            </td>
            <td class="entry">
              <input type="text" class="priceHome inTxt" value="<?php echo DPRICE;?>" size="10" /> 
            </td>
            <td class="symbol">
              <div class="expl">
                $
              </div>
            </td>
          </tr>
          <tr>
            <td>
              Interest Rate: 
            </td>
            <td>
              <img src="<?php echo URL; ?>/css/images/information.png" class="tTip" id="info2" 
              title="The expected percent interest rate you will get on your mortgage." alt="info"/>
            </td>
            <td class="entry">
              <input type="text" class="interest inTxt" value="<?php echo DINT;?>" size="5" />
            </td>
            <td class="symbol">
              <div class="expl">
                %
              </div>
            </td>
          </tr>
          <tr>
            <td>
              Down Payment: 
            </td>
            <td>
              <img src="<?php echo URL; ?>/css/images/information.png" class="tTip" id="info3" 
              title="The percent down payment you wish to put towards the home." alt="info"/>
            </td>
            <td class="entry">
              <input type="text" class="downPay inTxt" size="3" value="<?php echo DDP; ?>" />
            </td>
            <td class="symbol">
              <div class="expl">
                %
              </div>
            </td>
          </tr>
          <tr>
            <td>
              Term: 
            </td>
            <td>
              <img src="<?php echo URL; ?>/css/images/information.png" class="tTip" id="info4" 
              title="The number of years it will take to repay the loan amount (30 years is normal)." alt="info"/>
            </td>
            <td class="entry">
              <select class="term inSel">
            <?php
            for ($i = 5; $i<=50; $i+=5) {
                echo '<option value="' . $i . '"';

                if ($i == DTERM) {
                    echo ' selected="selected" ';
                }
                echo '>' . $i . '</option>' . "\n";
            }
            ?>
              </select>
            </td>
            <td class="symbol">
              <div class="expl">
                Years
              </div>
            </td>
          </tr>
          <tr>
            <td>
            </td>
            <td>
            </td>
            <td class="buttonRow" colspan="2">
              <button class="submit buttons greenButton">Calculate</button> 
              <button class="reset buttons blueButton">Reset</button>
            </td>
          </tr>
        </table>
      </form>
    </div>

    <div id="schedule"></div>

    <div id="calcFooter">
      <p>
        <?php echo DISCLAIMER; ?>
      </p>
    </div>  
  
  </div>
  <div class="waiting">
    <div class="center">
      <img src="<?php echo URL; ?>/css/images/ajax-loader.gif" alt="loading" />&nbsp;&nbsp;Please Wait...
    </div>
  </div>
</body>

</html>
