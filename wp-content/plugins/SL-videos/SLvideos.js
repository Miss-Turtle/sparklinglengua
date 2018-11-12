(function($){
	if($('tr').hasClass('enLigneTable')){
		$('tr.frLigneTable').hide('slow');
		$('tr.deLigneTable').hide('slow');
		$('tr.esLigneTable').hide('slow');
		$('tr.itLigneTable').hide('slow');
		$('tr.nlLigneTable').hide('slow');
		$('li.langueEN').css('color', '#222222').css('background-color', '#F9AA2B');
		$('li.langueFR').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueDE').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueES').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueIT').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueNL').css('color', '#F9AA2B').css('background-color', '#222222');
	} 
	$('li.langueEN').click(function(){
		$('tr.enLigneTable').show('slow');
		$('tr.frLigneTable').hide('slow');
		$('tr.deLigneTable').hide('slow');
		$('tr.esLigneTable').hide('slow');
		$('tr.itLigneTable').hide('slow');
		$('tr.nlLigneTable').hide('slow');
		$('li.langueEN').css('color', '#222222').css('background-color', '#F9AA2B');
		$('li.langueFR').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueDE').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueES').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueIT').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueNL').css('color', '#FFFFFF').css('background-color', '#222222');
	});
	$('li.langueFR').click(function(){
		$('tr.enLigneTable').hide('slow');
		$('tr.frLigneTable').show('slow');
		$('tr.deLigneTable').hide('slow');
		$('tr.esLigneTable').hide('slow');
		$('tr.itLigneTable').hide('slow');
		$('tr.nlLigneTable').hide('slow');
		$('li.langueEN').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueFR').css('color', '#222222').css('background-color', '#F9AA2B');
		$('li.langueDE').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueES').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueIT').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueNL').css('color', '#FFFFFF').css('background-color', '#222222');
	});
	$('li.langueDE').click(function(){
		$('tr.enLigneTable').hide('slow');
		$('tr.frLigneTable').hide('slow');
		$('tr.deLigneTable').show('slow');
		$('tr.esLigneTable').hide('slow');
		$('tr.itLigneTable').hide('slow');
		$('tr.nlLigneTable').hide('slow');
		$('li.langueEN').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueFR').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueDE').css('color', '#222222').css('background-color', '#F9AA2B');
		$('li.langueES').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueIT').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueNL').css('color', '#FFFFFF').css('background-color', '#222222');
	});
	$('li.langueES').click(function(){
		$('tr.enLigneTable').hide('slow');
		$('tr.frLigneTable').hide('slow');
		$('tr.deLigneTable').hide('slow');
		$('tr.esLigneTable').show('slow');
		$('tr.itLigneTable').hide('slow');
		$('tr.nlLigneTable').hide('slow');
		$('li.langueEN').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueFR').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueDE').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueES').css('color', '#222222').css('background-color', '#F9AA2B');
		$('li.langueIT').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueNL').css('color', '#FFFFFF').css('background-color', '#222222');
	});
	$('li.langueIT').click(function(){
		$('tr.enLigneTable').hide('slow');
		$('tr.frLigneTable').hide('slow');
		$('tr.deLigneTable').hide('slow');
		$('tr.esLigneTable').hide('slow');
		$('tr.itLigneTable').show('slow');
		$('tr.nlLigneTable').hide('slow');
		$('li.langueEN').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueFR').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueDE').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueES').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueIT').css('color', '#222222').css('background-color', '#F9AA2B');
		$('li.langueNL').css('color', '#FFFFFF').css('background-color', '#222222');
	});
	$('li.langueNL').click(function(){
		$('tr.enLigneTable').hide('slow');
		$('tr.frLigneTable').hide('slow');
		$('tr.deLigneTable').hide('slow');
		$('tr.esLigneTable').hide('slow');
		$('tr.itLigneTable').hide('slow');
		$('tr.nlLigneTable').show('slow');
		$('li.langueEN').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueFR').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueDE').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueES').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueIT').css('color', '#FFFFFF').css('background-color', '#222222');
		$('li.langueNL').css('color', '#222222').css('background-color', '#F9AA2B');
	});
})(jQuery);