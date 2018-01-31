function componentToHex(c) {
	var hex = c.toString(16);
	return hex.length == 1 ? '0' + hex : hex;
}

function rgbToHex(r, g, b) {
	return '#' + componentToHex(+r) + componentToHex(+g) + componentToHex(+b);
}

function putRandom() {
	//Maximum number of points per iteration
	let put = 200;
	//Maximum number of tries per iteration
	let maximumTries = 10000;
	//Image sizes
	const maximumX = 300;
	const maximumY = 250;

	const defaultColor = 'rgb(38,116,139)';

	//Put points on the map until we're out of points or out of tries
	while (put != 0 && maximumTries != 0) {
		//Get a random pixel
		let randomX = Math.floor(Math.random() * maximumX / 5);
		let randomY = Math.floor(Math.random() * maximumY / 5);
		let currentElement = document.getElementById('c' + randomX + 'x' + randomY);

		//Get the color of the random pixel (or default if missing) & maximum allowed color
		let color = currentElement.style['background-color'] || defaultColor;
		let colorParsed = color.replace('rgb(', '').replace(')', '').replace(/ /g, '').split(',');
		let colorHex = rgbToHex(...colorParsed);
		let maxAllowedColor = currentElement.dataset.max;

		//Put the next possible color if allowed
		if (colorHex == '#26748b' && maxAllowedColor != colorHex) {
			currentElement.style['background-color'] = '#429eb8';
			currentElement.style.opacity = 0.7;
			put--;
		} else if (colorHex == '#429eb8' && maxAllowedColor != colorHex) {
			currentElement.style['background-color'] = '#52b5d1';
			put--;
		} else if (colorHex == '#52b5d1' && maxAllowedColor != colorHex) {
			currentElement.style['background-color'] = '#61cbe9';
			put--;
		} else if (colorHex == '#61cbe9' && maxAllowedColor != colorHex) {
			currentElement.style['background-color'] = '#6abbb2';
			put--;
		} else if (colorHex == '#6abbb2' && maxAllowedColor != colorHex) {
			currentElement.style['background-color'] = '#74aa7b';
			put--;
		} else if (colorHex == '#74aa7b' && maxAllowedColor != colorHex) {
			currentElement.style['background-color'] = '#a4cb80';
			put--;
		} else if (colorHex == '#a4cb80' && maxAllowedColor != colorHex) {
			currentElement.style['background-color'] = '#d89748';
			put--;
		} else if (colorHex == '#d89748' && maxAllowedColor != colorHex) {
			currentElement.style['background-color'] = '#eb6f4a';
			put--;
		} else if (colorHex == '#eb6f4a' && maxAllowedColor != colorHex) {
			currentElement.style['background-color'] = '#e23c39';
			put--;
		}

		maximumTries--;
	}

	//Stop when we didn't put any points in the last iteration
	if (put != 200) {
		setTimeout(putRandom, 2);
	} else {
		console.log('stop');
	}
}

//Start the animation after 1s
setTimeout(putRandom, 1000);