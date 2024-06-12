<doctype html>
<html>
    <head></head>
    <body style="background-color: aqua;">
        <?php
        function area($a,$b,$h)
        {
            $area=($a+$b)*$h*0.5;
            echo"Area is: $area <br>";
        }
        function volume($l,$w,$h)
        {
            $volume=$l*$w*$h;
            echo"Volume is: $volume <br>";
        }
        function sa($l)
        {
            $sa=($l*$l*$l)*6;
            echo"Surface area is: $sa <br>";
        }
        //calling all function
        if (isset($_POST["area"])) 
        {
            //calling function area
            area($_POST["first"],$_POST["second"],$_POST["third"]);
        }
        if (isset($_POST["volume"])) 
        {
            //calling function volume
            volume($_POST["first"],$_POST["second"],$_POST["third"]);
        }
        if (isset($_POST["sa"])) 
        {
            //calling function surface area
            sa($_POST["first"],$_POST["second"],$_POST["third"]);
        }
        ?>
        <form action="" method="post">
            <input type="number" name="first" placeholder="Enter Your First Number"><br><br>
            <input type="number" name="second" placeholder="Enter Your Second Number"><br><br>
            <input type="number" name="third" placeholder="Enter Your Third Number"><br><br>
            <input type="submit" value="AREA" name="area">
            <input type="submit" value="VOLUME" name="volume">
            <input type="submit" value="SURFACE AREA" name="sa">
        </form>
    </body>
</html>
