function redirect(location) {
    window.location.href = location
}

const cards = [
    ["Fiverr", "../media/socials/fiverr.png", "https://fiverr.com/quillanw", "social"],
    ["Github", "../media/socials/github.png", "https://github.com/quillanw", "social"],
    ["Itch.io","../media/socials/itchio.png", "https://atlas-h.itch.io/", "social"],
    ["Mail","../media/socials/mail.png", "mailto:quillanwielhouwer@gmail.com", "contact"]
]

function loadSocials() {
    var socialContainer = document.getElementById('socialContainer')
    var contactContainer = document.getElementById('contactContainer')

    for (let i = 0; i < cards.length; i++) {
        var cardTop = document.createElement('div')
        cardTop.classList.add('socialTop')
        var cardImg = document.createElement('img')
        cardImg.src = cards[i][1]
        cardTop.append(cardImg)
        
        var cardBottom = document.createElement('div')
        cardBottom.classList.add('socialBottom')
        var cardText = document.createElement('h1')
        var cardGoText = document.createElement('button')
        cardGoText.innerHTML = '<< GO >>'
        cardGoText.addEventListener('click', () => window.location.href = cards[i][2])
        cardText.innerHTML = cards[i][0]
        cardBottom.append(cardText,cardGoText)
        
        var card = document.createElement('div')
        card.classList.add('socialCard')
        card.append(cardTop, cardBottom)

        if (cards[i][3] == "social") {
            socialContainer.append(card)
        } else if (cards[i][3] == "contact") {
            contactContainer.append(card)
        }
    }
}