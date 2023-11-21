import {STATUSES} from "@/constants/statuses.js";

export function setFirstLetterCapital(name) {
    return name.charAt(0).toUpperCase() + name.slice(1);
}

export function getRightStatusName(status) {
    let statusIndex = STATUSES.findIndex((item) => item.value === status);

    return STATUSES[statusIndex].name;
}
