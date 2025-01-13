  // vim: ts=2 sw=2 et
#include <arpa/inet.h>
#include <stdio.h>

// /!\ Cette fonction vous servira pendant le TP

// Ouvre une socket TCP serveur sur le port spécifié
// Retourne -1 en cas d'erreur
// retourne le numéro du descripteur de fichier de la socket en cas de succès
int server_socket(unsigned short int port) {
  // AF_INET → on veut une socket IP
  // SOCK_STREAM → on veut communiquer par TCP
  // 0 → choisir automatiquement le protocole (TCP)
  // retourne un file descriptor, c'est à dire le numéro d'un fichier ouvert
  // ce fichier, c'est notre socket bien sûr
  int num_socket = socket(AF_INET, SOCK_STREAM, 0);

  if (num_socket < 0) {
    perror("Erreur à la création de la socket");
    return -1;
  }

  // Cette structure nous permet de donner des options pour lier notre socket à
  // un port TCP sockaddr_in est une structure pour des options TCP
  struct sockaddr_in server;

  // On reprécise qu'on veut des connexions IP
  server.sin_family = AF_INET;
  // On veut que cette socket puisse être contactée depuis n'importe quelle
  // adresse IP de l'ordinateur
  server.sin_addr.s_addr = htonl(INADDR_ANY);
  // On veut écouter sur le port passé en paramètre de la fonction
  server.sin_port = htons(port);

  // On *bind* ("lie") notre socket au port TCP, sur les adresses précisées
  if (bind(num_socket, (struct sockaddr *)&server, sizeof(server)) < 0) {
    perror("Erreur au bind de la socket");
    return -1;
  }

  // On place le socket en mode écoute, file d'attente de longueur 1
  if (listen(num_socket, 1) < 0) {
    perror("listen");
    return -1;
  }

  // Il ne reste plus qu'à attendre les connexions avec accept(...), qui
  // créera une nouvelle socket pour la communication à chaque nouvelle
  // connexion d'un client

  return (num_socket);
}

// /!\ Cette fonction ne vous servira pas pendant le TP,
// elle uniquement là pour votre culture générale

// Ouvre une connexion TCP vers un serveur
// Retourne -1 en cas d'erreur
// retourne le numéro du descripteur de fichier de la socket
// de communication avec le serveur en cas de succès
int client_socket(const char server_ip[], unsigned short int port) {
  // AF_INET → on veut une socket IP
  // SOCK_STREAM → on veut communiquer par TCP
  // 0 → choisir automatiquement le protocole (TCP)
  // retourne un file descriptor, c'est à dire le numéro d'un fichier ouvert
  // ce fichier, c'est notre socket bien sûr
  int num_socket = socket(AF_INET, SOCK_STREAM, 0);

  if (num_socket < 0) {
    perror("Création du socket");
    return -1;
  }

  struct sockaddr_in client;

  // Conversion de la string de l'adresse IP en octets
  inet_pton(AF_INET, server_ip, &(client.sin_addr));

  // On reprécise qu'on veut des connexions IP
  client.sin_family = AF_INET;
  // On veut se connecter au port passé en paramètre de la fonction
  client.sin_port = htons(port);

  // On tente d'établir la connexion
  if (connect(num_socket, (struct sockaddr *)&client, sizeof client) ==
      -1) {
    perror("Erreur à la connexion de la socket");
    return -1;
  }

  // Il ne reste plus qu'à faire des read et des write sur la socket
  return num_socket;
}
