<?php



//Création du dossier image si n'existe pas
/**
 * @param string $folder
 * @return bool
 */
function CreateDestFolder(string $folder): bool
{
    if (!is_dir($folder)) {
        if (!mkdir($folder, 0755)) {
//            TODO rcho'Erreur : le répertoire cible ne peut-être créé ! Vérifiez que vous diposiez des droits suffisants pour le faire ou créez le manuellement !');
            return false;
        }
    }
    return true;
}


/**
 * @param $file
 * @param string $folder
 * @return string|true
 */
function Upload(/*TODO type ??*/ $file, string $folder): string
{

}