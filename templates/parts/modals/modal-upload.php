<div class="modal" data-modal="upload">
    <div class="wrap col-lg-3 col-md-4 col-lm-11 col-xs-11">
       <form id="upload-file">
			<div class="relative">
				<input type="file" 
				id="upload_file_input" 
				class="inputfile" multiple 
				name="upload_file[]"
				data-multiple-caption="Выбрано файлов {count}">
				<label for="upload_file_input"><span>Выберите файл...</span></label>
			</div>
			<script>
				var inputs = document.querySelectorAll('.inputfile');
				Array.prototype.forEach.call(inputs, function(input){
				  	var label	 = input.nextElementSibling,
				    labelVal = label.innerHTML;
				    input.addEventListener('change', function(e){
    					var fileName = '';
    					if( this.files && this.files.length > 1 ){
      						fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
    					}
    					else {
      						fileName = e.target.value.split( "\\" ).pop();
      					}
      					if( fileName )
						      label.querySelector( 'span' ).innerHTML = fileName;
						    else
						      label.innerHTML = labelVal;
							});
						});
			</script>	
			<button class="button-submit" type="submit">Загрузить документы</button>
		</form>
    </div>
    <div class="modal-close--overlay"></div>
</div>