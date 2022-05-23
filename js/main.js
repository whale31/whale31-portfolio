'use strict';

{
    const balloon = document.querySelector('#balloon');
    const count = document.querySelector('#count');

    let size = 100;
    let i = 0;
    function bigger() {
        size += 10;
        balloon.style.width = `${size}px`;
        balloon.style.height = `${size}px`;

        count.textContent = i;
        const timerId = setTimeout(bigger, 100);

        i++;
        if (i > 100) {
            clearTimeout(timerId);
        }
    }

    bigger();
}