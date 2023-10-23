class Card {
    #url

    constructor(url) {
        this.#url = url;
    }

    get $url() {
        return this.#url;
    }

    set $url(value) {
        this.#url = value;
    }
}