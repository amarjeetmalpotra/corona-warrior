// Flatpickr (Datetime)
if (document.getElementById("v-time")) {
	flatpickr("#v-time", {
		enableTime: true,
		dateFormat: "d-M-Y h:i K"
	});
}
// Register business form
if (document.getElementById("b-form")) {
	document.getElementById("b-form").addEventListener("submit", function (e) {
		e.preventDefault();
		const name = document.getElementById("b-name").value;
		const add = document.getElementById("b-add").value;
		const aadh = document.getElementById("b-aadh").value;
		const formData = new FormData(this);
		if (name === "") {
			toast("Enter your business name");
		} else if (add === "") {
			toast("Enter your business address");
		} else if (aadh.length != 12 || isNaN(aadh)) {
			toast("Enter a valid aadhar number");
		} else {
			// Animate add button
			const btn = document.getElementById("b-btn");
			btn.disabled = true;
			btn.innerHTML =
				"Processing <span class='spinner-border' role='status' aria-hidden='true' style='height: 1.5rem; width: 1.5rem'></span>";
			// Fetch API
			fetch("php/reg_bus.php", {
				method: "post",
				body: formData,
			})
				.then((response) => {
					return response.text();
				})
				.then((text) => {
					if (text == "registered") {
						window.location = "profile.php";
					} else {
						toast(text);
					}
					btn.disabled = false;
					btn.innerHTML = "Add Business";
				})
				.catch((error) => {
					toast(error);
					btn.disabled = false;
					btn.innerHTML = "Add Business";
				});
		}
	});
}
// Add visitor form
if (document.getElementById("v-form")) {
	document.getElementById("v-form").addEventListener("submit", function (e) {
		e.preventDefault();
		const aadh = document.getElementById("v-aadh").value;
		const formData = new FormData(this);
		if (aadh.length != 12 || isNaN(aadh)) {
			toast("Enter a valid aadhar number");
		} else {
			// Animate add button
			const btn = document.getElementById("v-btn");
			btn.disabled = true;
			btn.innerHTML =
				"Processing <span class='spinner-border' role='status' aria-hidden='true' style='height: 1.5rem; width: 1.5rem'></span>";
			// Fetch API
			fetch("php/add_vis.php", {
				method: "post",
				body: formData,
			})
				.then((response) => {
					return response.text();
				})
				.then((text) => {
					toast(text);
					document.getElementById("v-form").reset();
					btn.disabled = false;
					btn.innerHTML = "Add Visitor";
				})
				.catch((error) => {
					toast(error);
					btn.disabled = false;
					btn.innerHTML = "Add Visitor";
				});
		}
	});
}