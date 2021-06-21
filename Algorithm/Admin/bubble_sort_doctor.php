<?php


echo '
<!--Assigning php array to js array -->
<script>
var doc_username_js = <?php echo json_encode($username); ?>;
var doc_docFees_js = <?php echo json_encode($docFees); ?>;
</script>

<!-- converting js variable to Number data type -->
<script>
doc_docFees_js_float = doc_docFees_js.map(Number);
</script>

<!--Making bubble sort-->
<script>
function sortItems(doc_docFees_js_float) {
	for (let i = 0; i < doc_docFees_js_float.length; i++) {
		for (let j = 0; j < doc_docFees_js_float.length; j++) {
			if (doc_docFees_js_float[j] > doc_docFees_js_float[j + 1]) {
				let temp = doc_docFees_js_float[j];
				doc_docFees_js_float[j] = doc_docFees_js_float[j + 1];
				doc_docFees_js_float[j + 1] = temp;
			}
		}
	}
	return doc_docFees_js_float;
}
</script>

<!-- Creation of JS variable in Number datatype -->
<script>
var feesToSort = doc_docFees_js_float;
var sortedList = sortItems(feesToSort);
</script>


<script>
 for(let i = 0; i < sortedList.length; i++){ 
    document.write(sortedList[i]);
    document.write("<br>");
    
    }
</script>
'

?>