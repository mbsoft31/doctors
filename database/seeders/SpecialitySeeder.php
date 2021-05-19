<?php

namespace Database\Seeders;

use App\Models\Speciality;
use Illuminate\Database\Seeder;

class SpecialitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specialities = [
            "Allergologue",
            "Anatomo-cyto-pathologiste",
            "Andrologue",
            "Anesthésiste-réanimateur",
            "Angiologue",
            "Audioprothésiste",
            "Cancérologue",
            "Cancérologue médical",
            "Cancérologue radiothérapeute",
            "Cardiologue",
            "Chiropracteur",
            "Chirurgien",
            "Chirurgien cancérologue",
            "Chirurgien de la face et du cou",
            "Chirurgien de la main",
            "Chirurgien infantile",
            "Chirurgien maxillo-facial",
            "Chirurgien maxillo-facial et stomatologue",
            "Chirurgien oral",
            "Chirurgien orthopédiste",
            "Chirurgien plasticien et esthétique",
            "Chirurgien thoracique et cardio-vasculaire",
            "Chirurgien urologue",
            "Chirurgien vasculaire",
            "Chirurgien viscéral et digestif",
            "Chirurgien-dentiste",
            "Dermatologue",
            "Diététicien",
            "Endocrinologue",
            "Ergothérapeute",
            "Gastro-entérologue et hépatologue",
            "Généticien",
            "Gériatre",
            "Gynécologue médical",
            "Gynécologue médical et obstétrique",
            "Gynécologue obstétricien",
            "Hématologue",
            "Hypnothérapeute",
            "Infectiologue",
            "Infirmier",
            "Masseur-kinésithérapeute",
            "Médecin acupuncteur",
            "Médecin addictologue",
            "Médecin biologiste",
            "Médecin bucco-dentaire",
            "Médecin du sport",
            "Médecin du travail",
            "Médecin généraliste",
            "Médecin homéopathe",
            "Médecin morphologue et anti-âge",
            "Médecin nucléaire",
            "Médecin nutritionniste",
            "Médecin réanimateur",
            "Médecin spécialiste de santé publique",
            "Médecin urgentiste",
            "Naturopathe",
            "Néphrologue",
            "Neurochirurgien",
            "Neurologue",
            "Ophtalmologue",
            "Opticien-lunetier",
            "ORL",
            "ORL - Chirurgien de la face et du cou",
            "Orthodontiste",
            "Orthopédiste-orthésiste",
            "Orthopédiste-orthésiste-podologiste",
            "Orthophoniste",
            "Orthoptiste",
            "Ostéopathe",
            "Pédiatre",
            "Pédicure-podologue",
            "Pharmacien",
            "Phlébologue",
            "Pneumologue",
            "Psychanalyste",
            "Psychiatre",
            "Psychiatre de l'enfant et de l'adolescent",
            "Psychologue",
            "Psychomotricien",
            "Radiologue",
            "Radiothérapeute",
            "Rhumatologue",
            "Sage-femme",
            "Sophrologue",
            "Spécialiste en hémobiologie-transfusion",
            "Spécialiste en médecine interne",
            "Spécialiste en médecine légale et expertises médicales",
            "Spécialiste en médecine physique et de réadaptation",
            "Stomatologue",
        ];

        foreach ($specialities as $speciality) {
            Speciality::create(["name" => $speciality]);
        }
    }
}
