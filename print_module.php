<script type="text/javascript">
  function printDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      w=window.open();
      w.document.write(printContents);
      w.print();
      w.close();
  }
</script>
<!-- Ex:
  <div id="print-content">
   <form>
      <input type="button" onclick="printDiv('print-content')" value="print a div!"/>
    </form>
  </div> -->
