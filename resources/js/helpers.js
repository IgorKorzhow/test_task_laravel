export function setFirstLetterCapital(name) {
    const splitted = name.split("");

    const first = splitted[0].toUpperCase();

    const rest = [...splitted];

    rest.splice(0, 1);

    return [first, ...rest].join("");
}
