$(document).ready(function(){
	$("ul").css({"display":"none"});
	var toggleHash = function(){
		var button = $(".hashClick");
		button.click(function(e){
			$(this).siblings(".hash").children("ul").toggle("slide", {direction:"right"}, 500);

			return false; 
			e.preventDefault();
		});
	}
	toggleHash();
});