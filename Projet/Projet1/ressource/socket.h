// vim: ts=2 sw=2 et

// /!\ Cette fonction vous servira pendant le TP

// Ouvre une socket TCP serveur sur le port spécifié
// Retourne -1 en cas d'erreur
// retourne le numéro du descripteur de fichier de la socket en cas de succès
int server_socket(unsigned short int port);

// /!\ Cette fonction ne vous servira pas pendant le TP,
// elle uniquement là pour votre culture générale

// Ouvre une connexion TCP vers un serveur
// Retourne -1 en cas d'erreur
// retourne le numéro du descripteur de fichier de la socket
// de communication avec le serveur en cas de succès
int client_socket(const char *server_ip, unsigned short int port);
