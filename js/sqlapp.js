let labelAuth;
let errTemplates = {
	'smallPassword' : 'Password must be longer then 6 symbols', 
	'emptyLogin' : 'Login must be not empty'
};

window.onload = function () {

	var appendNewPlatform = function(e) {
		console.log(document.querySelector('#new-platform-input').value);
	}

	function setEventListeners() {
		document.querySelector('#new-platform-btn').addEventListener('click', appendNewPlatform);
	}

	labelAuth = document.querySelector('#label-auth-form');
	var signupBtn = document.querySelector('#button-signup');
	if(signupBtn) signupBtn.addEventListener("click", formValidation);
	setEventListeners();
}

var formValidation = function(e) {
	// TO-DO Node inserting error's templates
	let passMinLen = 6;
	let errPasswordTemplate = "Password must be longer then 6 symbols";
	let errEmptyLoginTemplate = "Login must be not empty";
	let errTemplate = "Password must be longer then 6 symbols";
	let inputPass = document.querySelector('#input-pass');
	let inputLogin = document.querySelector('#input-login');
	inputPass.removeEventListener("input", formValidation);
	if(inputPass.value.length < passMinLen) {
		e.preventDefault();
		labelAuth.innerText = errTemplate;
		labelAuth.removeAttribute("hidden");
		inputPass.classList.add('invalid');
		inputPass.addEventListener("input", formValidation);
	} else {
		inputPass.classList.remove('invalid');
		// labelAuth
	}

var createNewPlatform = function() {
	let field = document.querySelector('#new-platform-input');
	let plName = field.value;
		
}

	if(labelAuth.childern.length === 0) {
		labelAuth.setAttribute("hidden", true);
	}
}

function zzzap() {
	var exp = [
		[	1,		2.5,	2.5,	4.5,	4.5,	6.5,	6.5,	8	],
		[	2,		2,		2,		4.5,	4.5,	7,		7,		7	],
		[	1,		3.5,	3.5,	3.5,	3.5,	6.5,	8,		6.5	],
		[	4.5,	2.5,	2.5,	1,		4.5,	3,		3,		3	],
		[	2.5,	1,		2.5,	5,		7.5,	7.5,	5,		5	],
		[	6,		6,		6,		6,		6,		1,		2.5,	2.5	],
		[	3,		4,		1.5,	1.5,	5,		7.5,	7.5,	6	]
	];

	console.log(compute_cor(exp[4], exp[6]));

	var rCount = 0;
	var r = [];
	var dump = [];

	for(var i = 0; i < exp.length - 1; i++) {
		for (var j = i + 1; j < exp.length; j++) {
			dump[rCount] = [i, j];
			r[rCount++] = compute_cor(exp[i], exp[j]);
		}
	}

	var idxMin1;
	var idxMin2;
	var idxMax1;
	var idxMin2;
	var min = 10.0;
	var max = -10.0;

	var minArr = [];
	for (var i = 0; i < r.length; i++) {
		for (var j = 0; j < r.length; j++) {
			if(i == j) continue;
			if( dump[i][0] === dump[j][0] || dump[i][0] === dump[j][1] ||
				dump[i][1] === dump[j][0] || dump[i][1] === dump[j][1]) continue;
			var res = Math.abs(r[i] - r[j]);
			if(res < min) {
				idxMin1 = i;
				idxMin2 = j;
				min = res;
			}
			if(res > max) {
				idxMax1 = i;
				idxMax2 = j;
				max = res;
			}
			minArr.push([res, i, j]);
		}
	}

	minArr.sort((a, b) => a[0] - b[0]);


	console.log(min);
	console.log(dump[idxMin1], dump[idxMin2]);

	console.log(max);
	console.log(dump[idxMax1], dump[idxMax2]);

	console.log(minArr);
}

function compute_cor(arr1, arr2) {
	var d = [];
	var s = 0;
	var r = null;
	var n = arr1.length;
	for(var i = 0; i < arr1.length; i++) {
		d[i] = arr1[i] - arr2[i];
	}
	for(var i = 0; i < d.length; i++) {
		s += d[i] * d[i];
	}

	r = 1 - (6 * s) / (n*n*n - n);
	return r;
}














