export function getDate(date) {
    return new Date(date).toLocaleDateString();
}

export function getDogYears(date) {
    let currentDate = new Date(); // Current date
    let birthDate = new Date(date); // User's birth date
    let age = currentDate.getFullYear() - birthDate.getFullYear(); // Calculate the difference in years

    if (currentDate.getMonth() < birthDate.getMonth() || (currentDate.getMonth() === birthDate.getMonth() && currentDate.getDate() < birthDate.getDate())) {
        age--;
    }

    let yearsString = "";
    if (age === 0) {
        // If age is , display the number of months
        let months = (currentDate.getMonth() + 1) - (birthDate.getMonth() + 1);
        yearsString = `${months} месяц(ев)`;
    } else if (age === 1) {
        yearsString = `1 год`;
    } else if (age >= 2 && age <= 4) {
        yearsString = `${age} года`;
    } else {
        yearsString = `${age} лет`;
    }

    return yearsString;
}

export function getCsrfToken() {
    return document.querySelector('meta[name="csrf-token"]').getAttribute('content');
}

export function getFullname(obj) {
    return `${obj?.last_name} ${obj?.name} ${obj?.middle_name}`
}
