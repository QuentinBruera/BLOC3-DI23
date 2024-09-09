<?php
// // Assurez-vous que la session est démarrée
// if (session_status() == PHP_SESSION_NONE) {
//     session_start();
// }

$user_role = $_SESSION['user_role'] ?? null;
$user_favorite_club_id = $_SESSION['user_favorite_club_id'] ?? null;
?>

<div class="menu-bar">
    <div class="logo">
        <a href="./home">
            <img src="/BLOC3-DI23/front/assets/LogoBloc3.png" alt="Logo du site">
        </a>
    </div>
    <ul class="nav-links">
        <?php if ($user_role === 'admin') { ?>
            <li><a href="./create_match">Programmer un match</a></li>
            <li><a href="./result_match_management">Renseigner résultat</a></li>
        <?php } elseif ($user_role === 'coach') { ?>
            <li><a href="./club?club_id=<?php echo htmlspecialchars($_SESSION['user_favorite_club_id']); ?>">Mon équipe</a></li>
            <li><a href="./coach_management">Gérer mon équipe</a></li>
        <?php } elseif ($user_role) { ?>
            <li><a href="<?php echo $user_favorite_club_id ? "./club?club_id={$user_favorite_club_id}" : './clubs'; ?>">Mon équipe</a></li>
        <?php } ?>
        <li><a href="./clubs">Les équipes</a></li>
        <?php if (!$user_role) { ?>
            <li><a href="./login">Se connecter</a></li>
            <li><a href="./register">S'inscrire</a></li>
        <?php } else { ?>
            <li><a href="./account_management">Mon compte</a></li>
        <?php } ?>
    </ul>
</div>
