/*
 * Custom Scripts
 */

$(document).ready(function() {

	/*
	 * Date time picker
	 */
	$('#dpicker').datepicker({dateFormat: 'yy-mm-dd'});

	// equal height all footer panels
	$('.equal .panel').matchHeight();

	// redirect on click dropdown
	$('.dropdown-clickable').click(function() {
		window.location.href = $(this).attr('href');
	});

	/**
	 * Display login link on hover
	 */
	$('.bottom').hover(function () {
		$('#login').css('visibility', 'visible');
	}, function () {
		$('#login').css('visibility', 'hidden');
	});

	/*
	 * Slide up flash message after 3 seconds
	 */
	$('#flash_message').delay(3000).slideUp(300);

	/*
	 * Confirm delete and submit delete form
	 */
	$('.btn-del').click(function (event) {
		// prevent follow link
		event.preventDefault();

		// update action of form
		var action = $(this).attr('href');
		$('#delForm').attr('action', action);

		// show confirmation dialogue
		$('#delConfirm').modal('show');
	});

    /*
     * Dropdown on hover
     */
	$(function() {
		$('.dropdown-hover').hover(function() {
			$('ul.dropdown-menu', this).stop(true, true).slideDown('fast');
			$(this).delay(200).addClass('open');
		},
		function() {
			$('ul.dropdown-menu', this).stop(true, true).slideUp('fast');
			$(this).delay(200).removeClass('open');
		});
	});

	/*
	 * Highlight search results
	 */
	if ($('#search').length)
	{
		if ($('#search').val().length > 0)
		{
			$('.highlightable').each(function(i, obj) {
				var searchRegex = new RegExp('(' + $('#search').val() + ')', "ig");
				$(obj).html($(obj).html().replace(searchRegex, '<span class="highlight">$1</span>'));
			});
		}
	}

	/*
	 * Handle sliders in main page
	 */
	$('.toggle').click(function() {
		// slide up others
		$('.toggle').not(this).each(function() {
        	$(this).next().slideUp('fast');
     	});
     	// toggle clicked
     	$(this).next().slideToggle('fast');
	});

	/*
	 * Show page
	 */
	if ($('#imdbShow'))
	{
		var url = "http://www.omdbapi.com/?plot=full&i=" + $('#imdbShow').val();

		// get imdb data
		$.get(url, function(data, status){
			data = JSON.stringify(data);
			obj = jQuery.parseJSON(data);
			fillShow(obj);
	    });
	}

});

// fill show
function fillShow(obj)
{
	$('#director').text(obj.Director);
	$('#rating').text(obj.imdbRating + '/10');
	$('#genre').text(obj.Genre);
	$('#rated').text(obj.Rated);
	$('#runtime').text(obj.Runtime);
	$('#actors').text(obj.Actors);
	$('#awards').text(obj.Awards);
	$('#plot').text(obj.Plot);
}

// get imdb data by title
function getIMDBByTitle()
{
	var url = "http://www.omdbapi.com/?t=" + document.getElementById("title").value;
	
	// get imdb data
	$.get(url, function(data, status){
		data = JSON.stringify(data);
		obj = jQuery.parseJSON(data);
		fillForm(obj);
    });
}

// get imdb data by imdb id
function getIMDBByID()
{
	var url = "http://www.omdbapi.com/?i=" + document.getElementById("imdb").value;
	
	// get imdb data
	$.get(url, function(data, status){
		data = JSON.stringify(data);
		obj = jQuery.parseJSON(data);
		fillForm(obj);
    });
}

// fill the form
function fillForm(obj)
{
	if ((obj.Type.toUpperCase() === $('#type').val().toUpperCase()) || ($('#type').val().toUpperCase() === "ANIME") || ($('#type').val().toUpperCase() === "VIDEO"))
	{
		$('#imdb').val(obj.imdbID);
		$('#poster').val(obj.Poster);
		$('#title').val(obj.Title);
		$('#release_year').val(obj.Year);
		$('.release_date').val(formatDate(obj.Released));
		$('#plot').val(obj.Plot);
		$('#genre').val(obj.Genre);
		$('#check_imdb').attr('href', "http://www.imdb.com/title/" + obj.imdbID + "/");
		$('#check_poster').attr('href', obj.Poster);
	}
	else
	{
		$('#imdb, #release_year, #plot, #genre').val("");
	}
}

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2) month = '0' + month;
    if (day.length < 2) day = '0' + day;

    return [year, month, day].join('-');
}