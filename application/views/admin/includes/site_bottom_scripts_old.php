
    <script>window.jQuery || document.write('<script src="<?=base_url()?>assets/admin/js/jquery.js">\x3C/script>')</script>
    <script src="<?=base_url()?>assets/admin/js/bootstrap.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/jquery-ui-1.9.2.custom.min.js"></script>
    <script src="<?=base_url()?>assets/admin/js/jquery.ui.touch-punch.min.js"></script>
    <script class="include" type="text/javascript" src="<?=base_url()?>assets/admin/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?=base_url()?>assets/admin/js/jquery.scrollTo.min.js"></script>

    <!-- Datatable -->
    <script src="<?=base_url()?>assets/admin/datatable/js/jquery.dataTables.js"></script>
    

    <script>
        $(document).ready(function(){
            $('#display_table').dataTable();
        });
    </script>

    <!--common script for all pages-->
    <script src="<?=base_url()?>assets/admin/js/common-scripts.js"></script>

    <script type="text/javascript">
    var _validFileExtensions = [".xls"];
        function Validate(oForm) {
            var arrInputs = oForm.getElementsByTagName("input");
            for (var i = 0; i < arrInputs.length; i++) {
                var oInput = arrInputs[i];
                if (oInput.type == "file") {
                    var sFileName = oInput.value;
                    if (sFileName.length > 0) {
                        var blnValid = false;
                        for (var j = 0; j < _validFileExtensions.length; j++) {
                            var sCurExtension = _validFileExtensions[j];
                            if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
                                blnValid = true;
                                break;
                            }
                        }
                        
                        if (!blnValid) {
                            alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
                            return false;
                        }
                    }
                }
            }
          
            return true;
        }
    </script>