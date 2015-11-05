$(document).ready(function() {  
            $(".loading").hide();
               $('#kdtarif').change(function(){
                var har = this.value ;
                   var url = "{{ URL::asset('') }}harga/";
                   $(".loading").show();
                   $('#posisi').delay(0.01).queue(function( nxt ) {
                       $(this).load(url);
                       nxt();
                   }); 
               });    
        });

$('.form_date').datetimepicker({
			        language:  'Indonesian',
			        weekStart: 1,
			        todayBtn:  1,
					autoclose: 1,
					todayHighlight: 1,
					startView: 2,
					minView: 2,
					forceParse: 0
			    });
				
				$(".dropdown-menu li a").click(function(){
					var selText = $(this).text();
					$(this).parents('.btn-group').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
				});


