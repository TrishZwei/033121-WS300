let slideCount = 0; //stores the number of slides we have
let currentSlide = 1; //keeps track of the slide in the slide window.
 let slideContainer = $('.slide-container'); //sets slideContainer to be $('.slide-container')

console.log( $('.slide') )

$('.slide').each( function(index){

	$(this).attr('id', index+1 )//this adds the attribute id and then sets it with the second argument
	if(index !=0){
		//this gets all but the 0 index item
		$(this).css({'left':slideContainer.width()}) //gets current width of slide container
	}else{
		$(this).addClass('current');
	}

	slideCount++; //increments slideCount by 1

}) //initial set up of slides to their proper positions.
	
	function nextSlide(){
		removeClicks();

	let incomingSlide = currentSlide + 1; 

	if(incomingSlide > slideCount){
		incomingSlide = 1; 
	}

	$('#'+currentSlide).removeClass('current').animate({'left':-slideContainer.width()},300, function(){
		//callback function:
		$(this).css({'left':slideContainer.width()})
		addClicks();
	});
	$('#'+incomingSlide).addClass('current').animate({'left': 0}, 300)

	currentSlide = incomingSlide;

	}

	function prevSlide(){
		removeClicks();
		let incomingSlide = currentSlide - 1;

		if(incomingSlide == 0){
			incomingSlide = slideCount; 
			//slideCount is the .length of our slides
		}

		//animate out the current slide:
		$('#'+currentSlide).removeClass('current').animate({'left': slideContainer.width()}, 300, function(){
			addClicks();
		})
		$('#'+incomingSlide).addClass('current').css({'left': -slideContainer.width()}).animate({'left': 0}, 300)

		currentSlide = incomingSlide;

	}


	function adjustSlider(){
		let sBoxH = slideContainer.height();
		let sBoxW = slideContainer.width();
		$('.slide:not(".current")').css({'left':sBoxW})
		console.log('resize')
	}

	//event listener on window:

	$(window).resize( adjustSlider );

	//long version: $(window).on('resize', adjustSlider)

//controls when clicks are available.
	function addClicks(){
		$('.next').on('click', nextSlide); //no parenthesis ex: nextSlide() because the handler will run it.
		$('.prev').on('click', prevSlide);
	}

	function removeClicks(){
		$('.next, .prev').off();
		//$('.prev').off();

	}

addClicks();

	$('.accordion h3').on('click', function(){
		console.log(this) ; //this is a keyword in JS
		let thisTitle = $(this); 
		thisTitle.next().slideToggle(1000);

	})