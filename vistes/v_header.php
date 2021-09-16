<!DOCTYPE html>
<html>

        <div class="topmenu" >
            <a href = "https://www.instagram.com/" target= "_self" >
                <img src="../img/logos/instagram.png">
            </a>
            <a href = "https://www.facebook.com/" target= "_self" >
                <img src="../img/logos/facebook.png">
            </a>
            <a href = "https://www.youtube.com/" target= "_self" >
                <img src="../img/logos/youtube.png">
            </a>
            <a href = "https://twitter.com/" target= "_self" >
                <img src="../img/logos/twitter.png" >
            </a>

        </div>

        <div class="mainheader">
            <div class="logo">
                <img src="../img/l3.png" width="190" />
            </div>

            <div class="navmenu" >
                <ul class="headerContainer">
                    <li class="homebutton" >
                        <a href = "index.php?action=home" target= "_self" >
                        HOME
                            <!-- <hr class="actualbutton"> -->
                        </a> </li>

                    <li class="shopbutton">
                        <a href = "index.php?action=shop" target= "_self" >
                        SHOP
                        </a> </li>
                    <li class="aboutusbutton">
                        <a href = "index.php?action=aboutus" target= "_self" >
                        ABOUT US
                        </a>
                    </li>

                </ul>
            </div>

            <div class="cartmenu">
                <ul >
                    <li>
                        <div class="dropdownlink"  >
                            <button target= "_self" >
                                ACCOUNT
                            </button>

                        </div>
                        <div class="account-options" >
                            <ul>

                                <?php if(isset($_SESSION['user_id'])){ ?>
                                <li> <a href="index.php?action=llistat_comandes">
                                        Orders
                                    </a> </li>

                                <li> <a href="index.php?action=profile">
                                        Profile
                                    </a> </li>

                                <li> <a href="index.php?action=logout">
                                        Logout
                                    </a>
                                </li>

                                <?php }else{ ?>
                                    <li> <a href="index.php?action=login">
                                            Login

                                        </a>
                                    </li>
                                    <li>
                                        <a href="index.php?action=login">

                                            Register
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>

                    </li>
                    <li>
                        <button type="button" onclick="location.href='index.php?action=cart';" target= "_self" id="cart">
                            CART
                        </button>
                    </li>
                </ul>

            </div>
        </div>

        <div class="lineasep">

        </div>

</html>