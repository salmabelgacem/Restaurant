
console.log("JS chargé avec succès !");
document.addEventListener("DOMContentLoaded", function () {
  // 1. Gestion des boutons "Order Now"
  const orderButtons = document.querySelectorAll(".menu_btn");
  const foodNameInput = document.getElementById("foodName");
  const orderSection = document.getElementById("Order");

  orderButtons.forEach(button => {
    button.addEventListener("click", function (e) {
      e.preventDefault();

      const menuInfo = this.closest(".menu_info");
      if (menuInfo) {
        const foodName = menuInfo.querySelector("h2").textContent.trim();
        foodNameInput.value = foodName;

        // Défilement vers la section commande
        orderSection.scrollIntoView({ behavior: "smooth" });

        // Focus sur la quantité
        document.getElementById("orderCount").focus();
      }
    });
  });

  // 2. Validation du formulaire de commande
  const orderForm = document.getElementById("orderForm");
  orderForm.addEventListener("submit", function (e) {
    e.preventDefault();

    const name = document.getElementById("name").value.trim();
    const email = document.getElementById("email").value.trim();
    const number = document.getElementById("number").value.trim();
    const count = document.getElementById("orderCount").value.trim();
    const food = document.getElementById("foodName").value.trim();
    const address = document.getElementById("address").value.trim();

    // Vérifier que tous les champs sont remplis
    if (!name || !email || !number || !count || !food || !address) {
      alert("⚠️ Veuillez remplir tous les champs.");
      return;
    }

    // Vérifier que l'email est au bon format
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
      alert("📧 Veuillez entrer une adresse email valide.");
      return;
    }

    // Vérifier que le numéro de téléphone est correct (8 chiffres tunisiens)
    const phoneRegex = /^[2459]\d{7}$/;
    if (!phoneRegex.test(number)) {
      alert("📞 Numéro invalide. Il doit contenir 8 chiffres et commencer par 2, 4, 5 ou 9.");
      return;
    }

    // Message de confirmation
    alert(`✅ Merci ${name} pour votre commande de ${count} ${food}(s). Nous vous contacterons au ${number}.`);

    // Réinitialisation du formulaire
    orderForm.reset();
    window.scrollTo({ top: 0, behavior: "smooth" });
  });

  // 3. Animation cœur (ajouter/enlever aux favoris)
  const heartIcons = document.querySelectorAll(".small_card i.fa-heart");
  heartIcons.forEach(icon => {
    icon.addEventListener("click", function () {
      this.classList.toggle("favorited");

      // Mettre à jour le message d'info (infobulle)
      this.title = this.classList.contains("favorited")
        ? "Ajouté aux favoris !"
        : "Clique pour ajouter aux favoris";
    });
  });

  // 4. Compteur de caractères pour l'adresse
  const addressInput = document.getElementById("address");
  const charCounter = document.createElement("small");
  charCounter.style.display = "block";
  charCounter.style.marginTop = "5px";
  charCounter.style.color = "#666";
  addressInput.parentElement.appendChild(charCounter);

  addressInput.addEventListener("input", function () {
    const max = 200;
    const length = addressInput.value.length;
    charCounter.textContent = `${length}/${max} caractères`;

    if (length > max) {
      addressInput.value = addressInput.value.substring(0, max);
      charCounter.style.color = "red";
    } else {
      charCounter.style.color = "#666";
    }
  });

  // 5. Message de bienvenue animé
  const welcome = document.createElement("div");
  welcome.textContent = "👋 Bienvenue sur notre restaurant en ligne !";
  welcome.style.position = "fixed";
  welcome.style.top = "20px";
  welcome.style.left = "50%";
  welcome.style.transform = "translateX(-50%)";
  welcome.style.background = "#ffb703";
  welcome.style.color = "#000";
  welcome.style.padding = "10px 20px";
  welcome.style.borderRadius = "20px";
  welcome.style.boxShadow = "0 0 10px rgba(0,0,0,0.2)";
  welcome.style.zIndex = "9999";
  welcome.style.opacity = "0";
  welcome.style.transition = "opacity 1.5s ease";
  document.body.appendChild(welcome);

  // Animation fondu (affichage/disparition)
  setTimeout(() => { welcome.style.opacity = "1"; }, 500);
  setTimeout(() => { welcome.style.opacity = "0"; }, 5000);
  setTimeout(() => { welcome.remove(); }, 6500);
});
