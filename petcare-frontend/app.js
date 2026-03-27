const API_URL = "http://127.0.0.1:8000/api";

const loginBtn = document.getElementById("loginBtn");
const logoutBtn = document.getElementById("logoutBtn");
const loadPetsBtn = document.getElementById("loadPetsBtn");
const createPetBtn = document.getElementById("createPetBtn");

const loginStatus = document.getElementById("loginStatus");
const petsList = document.getElementById("petsList");

function getToken() { return localStorage.getItem("token"); }
function setToken(token) { localStorage.setItem("token", token); }
function removeToken() { localStorage.removeItem("token"); }

loginBtn.addEventListener("click", async () => {
  const email = document.getElementById("email").value;
  const password = document.getElementById("password").value;
  const response = await fetch(`${API_URL}/login`, {
    method: "POST",
    headers: { "Content-Type": "application/json", "Accept": "application/json" },
    body: JSON.stringify({ email, password })
  });
  const data = await response.json();
  if (!response.ok) return loginStatus.textContent = "Error de login";
  setToken(data.token);
  loginStatus.textContent = `Sesión iniciada como ${data.user.name}`;
});

logoutBtn.addEventListener("click", async () => {
  const token = getToken();
  if (!token) return loginStatus.textContent = "No hay sesión iniciada";
  await fetch(`${API_URL}/logout`, {
    method: "POST",
    headers: { "Authorization": `Bearer ${token}`, "Accept": "application/json" }
  });
  removeToken();
  loginStatus.textContent = "Sesión cerrada";
});

loadPetsBtn.addEventListener("click", async () => {
  const token = getToken();
  if (!token) return alert("Debes iniciar sesión primero");
  const response = await fetch(`${API_URL}/v1/pets`, {
    headers: { "Authorization": `Bearer ${token}`, "Accept": "application/json" }
  });
  const data = await response.json();
  petsList.innerHTML = "";
  const pets = data.data ?? data;
  pets.forEach(pet => {
    const li = document.createElement("li");
    li.innerHTML = `
      <strong>${pet.nombre}</strong> - ${pet.especie} - ${pet.raza} - ${pet.edad} años
      <br>Sexo: ${pet.sexo ?? '-'} | Peso: ${pet.peso ?? '-'} | Chip: ${pet.chip ?? '-'}
      <br>Esterilizado: ${pet.esterilizado ? 'Sí' : 'No'} | Vacunado: ${pet.vacunado ? 'Sí' : 'No'}
      <br>Observaciones: ${pet.observaciones ?? '-'}
      <br><button onclick="deletePet(${pet.id})">Eliminar</button>
    `;
    petsList.appendChild(li);
  });
});

createPetBtn.addEventListener("click", async () => {
  const token = getToken();
  if (!token) return alert("Debes iniciar sesión primero");

  const payload = {
    nombre: document.getElementById("nombre").value,
    especie: document.getElementById("especie").value,
    raza: document.getElementById("raza").value,
    edad: parseInt(document.getElementById("edad").value || "0"),
    sexo: document.getElementById("sexo").value,
    peso: parseFloat(document.getElementById("peso").value || "0"),
    fecha_nacimiento: document.getElementById("fecha_nacimiento").value,
    chip: document.getElementById("chip").value,
    esterilizado: document.getElementById("esterilizado").checked,
    vacunado: document.getElementById("vacunado").checked,
    observaciones: document.getElementById("observaciones").value
  };

  const response = await fetch(`${API_URL}/v1/pets`, {
    method: "POST",
    headers: {
      "Authorization": `Bearer ${token}`,
      "Content-Type": "application/json",
      "Accept": "application/json"
    },
    body: JSON.stringify(payload)
  });

  const data = await response.json();
  if (!response.ok) {
    console.error(data);
    return alert("Error al crear mascota");
  }

  alert("Mascota creada correctamente");
  loadPetsBtn.click();
});

async function deletePet(id) {
  const token = getToken();
  if (!confirm("¿Seguro que quieres eliminar esta mascota?")) return;
  const response = await fetch(`${API_URL}/v1/pets/${id}`, {
    method: "DELETE",
    headers: { "Authorization": `Bearer ${token}`, "Accept": "application/json" }
  });
  if (!response.ok) return alert("Error al eliminar mascota");
  alert("Mascota eliminada");
  loadPetsBtn.click();
}