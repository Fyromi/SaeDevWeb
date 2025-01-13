// vim: ts=2 sw=2 et

// returns
// ' ' when game is in progress
// 'X' when X wins
// 'O' when O wins
// '?' when game is finished but no one wins
char get_winner(char board[9]);

void print_board(int file_descriptor, char board[9]);
