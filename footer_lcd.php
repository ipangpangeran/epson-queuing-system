<footer id="footer-fix">
    <div id="footer-fix" class="footer-fix">
        <span style='font-family:arial; font-size: 21px; font-weight:bold; color:#ffffff;' id="respon_text"></span>
    </div>
</footer>

<script>
  $(document).ready(function() {
  $("#respon_text").load("modul/running_text/respon_run-text.php");
   var refreshId = setInterval(function() {
  $("#respon_text").load('modul/running_text/respon_run-text.php');
   }, 30000);
  $.ajaxSetup({ cache: false });
});
</script>