<script type="text/javascript">;
        var loged = <?php echo $_SESSION['loged']?>;

        if(loged==1)
        {
            var acc = document.getElementById('login1');
                acc.innerHTML="<?php echo $_SESSION['user']->username?>";
        }
        else
        {
            var acc = document.getElementById('login1');
            if(lng=="eng")
            acc.innerHTML="Account";
            if(lng=="srb")
            acc.innerHTML="Nalog";  
        }
    </script>