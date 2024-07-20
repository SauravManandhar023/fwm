document.addEventListener("DOMContentLoaded", () => {
  const inputField = document.getElementById("input");
  inputField.addEventListener("keydown", (e) => {
    if (e.code === "Enter" || e.keyCode === 13) {
      let input = inputField.value;
      inputField.value = "";
      output(input);
    }
  });
});

const prompts = [
  ["who are you", "what is your name", "what do you do"],
  ["how can i help", "how can i donate", "ways to contribute"],
  ["what is sdg 3", "sdg 3", "sustainable development goal 3"],
  ["where can i donate food", "food donation locations"],
  ["how do you help the community", "community support"],
  ["how do you ensure food safety", "food safety measures"],
  ["what are your operating hours", "when are you open"],
  ["who benefits from the donations", "who receives the food"],
  ["can i volunteer", "volunteer opportunities"],
  ["what type of food can i donate", "acceptable food donations"]
];

const replies = [
  ["We are a non-profit organization dedicated to ending hunger and promoting good health and well-being."],
  ["You can help by donating food, volunteering your time, or making a monetary donation on our website."],
  ["SDG 3 aims to ensure healthy lives and promote well-being for all at all ages."],
  ["You can donate food at our main office or at any of our partner locations listed on our website."],
  ["We provide food and support to those in need, ensuring no one goes hungry in our community."],
  ["We follow strict food safety guidelines to ensure all donations are safe for consumption."],
  ["Our operating hours are from 9 AM to 5 PM, Monday to Friday."],
  ["Donations benefit low-income families, the homeless, and others in need in our community."],
  ["Yes, we have many volunteer opportunities available. Visit our website to sign up."],
  ["We accept non-perishable food items, fresh produce, and canned goods."]
];

const coronavirus = ["Please stay safe and follow the recommended guidelines to protect yourself from COVID-19."];
const alternative = ["I'm here to help! Can you please rephrase your question?"];

function output(input) {
  let product;

  let text = input.toLowerCase().replace(/[^\w\s]/gi, "").replace(/[\d]/gi, "").trim();
  text = text
    .replace(/ a /g, " ")
    .replace(/i feel /g, "")
    .replace(/whats/g, "what is")
    .replace(/please /g, "")
    .replace(/ please/g, "")
    .replace(/r u/g, "are you")
    .replace(/tell about /g, "");

  if (compare(prompts, replies, text)) {
    product = compare(prompts, replies, text);
  } else if (text.match(/thank/gi)) {
    product = "You're welcome!";
  } else if (text.match(/(corona|covid|virus)/gi)) {
    product = coronavirus[Math.floor(Math.random() * coronavirus.length)];
  } else if (text.match(/(food|hungry|eat|meal|dinner|lunch|breakfast)/gi)) {
    product = "If you are in need of food, please visit our website to donate or receive help.";
  } else if (text.match(/(website|organization)/gi)) {
    product = "Our organization ensures to provide for the needy.";
  } else {
    product = alternative[Math.floor(Math.random() * alternative.length)];
  }

  addChat(input, product);
}

function compare(promptsArray, repliesArray, string) {
  let reply;
  let replyFound = false;
  for (let x = 0; x < promptsArray.length; x++) {
    for (let y = 0; y < promptsArray[x].length; y++) {
      if (promptsArray[x][y] === string) {
        let replies = repliesArray[x];
        reply = replies[Math.floor(Math.random() * replies.length)];
        replyFound = true;
        break;
      }
    }
    if (replyFound) {
      break;
    }
  }
  return reply;
}

function addChat(input, product) {
  const messagesContainer = document.getElementById("messages");

  let userDiv = document.createElement("div");
  userDiv.id = "user";
  userDiv.className = "user response";
  userDiv.innerHTML = `<img src="img/user.png" class="avatar"><span>${input}</span>`;
  messagesContainer.appendChild(userDiv);

  let botDiv = document.createElement("div");
  let botImg = document.createElement("img");
  let botText = document.createElement("span");
  botDiv.id = "bot";
  botImg.src = "img/bot-mini.png";
  botImg.className = "avatar";
  botDiv.className = "bot response";
  botText.innerText = "Typing...";
  botDiv.appendChild(botImg);
  botDiv.appendChild(botText);
  messagesContainer.appendChild(botDiv);
  
  messagesContainer.scrollTop = messagesContainer.scrollHeight - messagesContainer.clientHeight;

  setTimeout(() => {
    botText.innerText = product;
    textToSpeech(product);
  }, 2000);
}

function textToSpeech(text) {
  const speech = new SpeechSynthesisUtterance();
  speech.text = text;
  speech.volume = 1;
  speech.rate = 1;
  speech.pitch = 1;
  window.speechSynthesis.speak(speech);
}
