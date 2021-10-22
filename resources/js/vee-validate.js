import { extend, localize } from "vee-validate";
import {
    required as rule_required,
    email as rule_email,
    max as rule_max,
    min as rule_min,
    confirmed as rule_confirmed,
    regex as rule_regex,
    between as rule_between,
    alpha as rule_alpha,
    integer as rule_integer,
    digits as rule_digits,
    alpha_dash as rule_alpha_dash,
    alpha_num as rule_alpha_num,
    alpha_spaces as rule_alpha_spaces,
    length as rule_length,
    numeric as rule_numeric,
    is as rule_is
} from "vee-validate/dist/rules";

// eslint-disable-next-line object-curly-newline
import {
    validatorPositive,
    validatorUrlValidator,
    validatorPassword,
    validatorCreditCard
} from "./validators";

// ////////////////////////////////////////////////////////
// General
// ////////////////////////////////////////////////////////

export const required = extend("required", rule_required);

export const email = extend("email", rule_email);

export const min = extend("min", rule_min);

export const max = extend("max", rule_max);

export const confirmed = extend("confirmed", rule_confirmed);

export const regex = extend("regex", rule_regex);

export const between = extend("between", rule_between);

export const is = extend("is", rule_is);

export const alpha = extend("alpha", rule_alpha);

export const integer = extend("integer", rule_integer);
export const numeric = extend("numeric", rule_numeric);

export const digits = extend("digits", rule_digits);

export const alphaDash = extend("alpha_dash", rule_alpha_dash);

export const alphaNum = extend("alpha_num", rule_alpha_num);
export const alphaSpaces = extend("alpha_spaces", rule_alpha_spaces);

export const length = extend("length", rule_length);

export const positive = extend("positive", {
    validate: validatorPositive,
    message: "Please enter positive number!"
});

export const credit = extend("credit-card", {
    validate: validatorCreditCard,
    message: "It is not valid credit card!"
});

export const password = extend("password", {
    validate: validatorPassword,
    message:
        "Your {_field_} must contain at least one uppercase, one lowercase, one special character and one digit"
});

export const url = extend("url", {
    validate: validatorUrlValidator,
    message: "URL is invalid"
});

// Install English and Arabic localizations.
localize({
    en: {
        messages: {
            alpha: "{_field_} may only contain alphabetic characters",
            alpha_num: "{_field_} may only contain alpha-numeric characters",
            alpha_dash:
                "{_field_} may contain alpha-numeric characters as well as dashes and underscores",
            alpha_spaces:
                "{_field_} may only contain alphabetic characters as well as spaces",
            confirmed: "Passwords do not match",
            email: "This field must be a valid email",
            max: "{_field_} may not be greater than {length} characters",
            min: "{_field_} must be at least {length} characters",
            numeric: "{_field_} may only contain numeric characters",
            required: "{_field_} is required",
            regex: "The field format is invalid",
            // Custom
            emailUnique: "This Email already taken",
            displayNameUnique: "This Username already taken",
            cinUnique: "This CIN already exists"
        },
        names: {
            address: "Address",
            appointments: "Appointments",
            birthdate: "Birth date",
            city: "City",
            CIN: "CIN",
            client: "Client",
            condition: "Condition",
            confirmPassword: "Password confirmation",
            contacts: "Contacts",
            currentPassword: "Current password",
            description: "description",
            dueDate: "Due date",
            duration: "Duration",
            email: "Email",
            endsAt: "Ends at",
            firstName: "First Name",
            fullName: "Full Name",
            gender: "Gender",
            lastName: "Last Name",
            location: "location",
            main: "Main",
            members: "Members",
            message: "Message",
            meetings: "Meetings",
            office: "Office",
            password: "Password",
            place: "Place",
            placeOfBirth: "Place of birth",
            phone: "Phone",
            reason: "Reason",
            patente: "Patent",
            price: "Price",
            region: "Region",
            role: "Role",
            sector: "Sector",
            services: "Services",
            startsAt: "Starts at",
            subject: "subject",
            terms: "Terms & Conditions",
            title: "Title",
            userName: "Username",
            website: "Website"
        }
    },
    fr: {
        messages: {
            alpha: "{_field_} ne peut contenir que des lettres",
            alpha_num:
                "{_field_} ne peut contenir que des caractères alpha-numériques",
            alpha_dash:
                "{_field_} ne peut contenir que des caractères alpha-numériques, tirets ou soulignés",
            alpha_spaces:
                "{_field_} ne peut contenir que des lettres ou des espaces",
            confirmed: "Les mots de passe ne correspondent pas",
            email: "Ce champ doit être une adresse e-mail valide",
            max: "{_field_} ne peut pas contenir plus de {length} caractères",
            min: "{_field_} doit contenir au minimum {length} caractères",
            numeric: "{_field_} ne peut contenir que des chiffres",
            required: "{_field_} est obligatoire",
            regex: "Le champ est invalide",
            // Custom
            emailUnique: "Cet e-mail a déjà été pris",
            displayNameUnique: "Ce nom d'utilisateur a déjà été utilisé",
            cinUnique: "Ce CNIE existe déjà"
        },
        names: {
            address: "Adresse",
            appointments: "Rendez-vous",
            birthdate: "Date de naissance",
            city: "Ville",
            CIN: "CNIE",
            condition: "état",
            confirmPassword: "Confirmation mot de passe",
            contacts: "Contacts",
            client: "Client",
            currentPassword: "Mot de passe actuel",
            description: "la description",
            dueDate: "date d'échéance",
            duration: "Durée",
            endsAt: "Fini à",
            email: "E-mail",
            fullName: "Nom complet",
            firstName: "Prénom",
            gender: "sex",
            lastName: "Nom",
            location: "le lieu",
            main: "Princaple",
            members: "employés",
            message: "Message",
            meetings: "Réunions",
            office: "établissement",
            password: "Mot de pass",
            patente: "Patente",
            placeOfBirth: "Lieu de naissance",
            phone: "Téléphone",
            place: "Lieu",
            price: "Prix",
            reason: "Raison",
            role: "Rôle",
            region: "Région",
            sector: "Secteur",
            services: "Services",
            startsAt: "commence à",
            subject: "sujet",
            terms: "termes et conditions.",
            title: "Titre",
            type: "Type",
            userName: "Nom d'utilisateur",
            website: "Site web"
        }
    },
    ar: {
        messages: {
            alpha: "{_field_} يجب ان يحتوي على حروف فقط",
            alpha_num: "{_field_} قد يحتوي فقط على حروف وارقام",
            alpha_dash: "{_field_} قد يحتوي على حروف او الرموز - و _",
            alpha_spaces: "{_field_} قد يحتوي فقط على حروف ومسافات",
            confirmed: "كلمة السر غير متطابقتين",
            email: "هذا الحقل  يجب ان يكون بريدا الكترونيا صحيحا",
            max: "{_field_} يجب ان يحتوي على {length} حروف على الأكثر",
            min: "{_field_} يجب ان يحتوي على {length} حروف على الأقل",
            required: "{_field_} مطلوب",
            regex: "الحقل غير صحيح",
            // Custom
            emailUnique: "هذا البريد الإلكتروني مأخوذ",
            displayNameUnique: "اسم المستخدم هذا مأخوذ",
            cinUnique: "ر.ب.و استخدم من قبل"
        },
        names: {
            address: "العنوان",
            appointments: "المواعيد",
            birthdate: "تاريخ الإزدياد",
            city: "المدينة",
            CIN: "ر.ب.و",
            client: "الزبون",
            condition: "الحالة",
            confirmPassword: "تأكيد كلمة المرور",
            contacts: "جهات الاتصال",
            currentPassword: "كلمة السر الحالية",
            dueDate: "الموعد",
            duration: "المدة الزمنية",
            description: "الوصف",
            endsAt: "ينتهي في",
            email: "البريد الإلكتروني",
            fullName: "الاسم الكامل",
            firstName: "الإسم الشخصي",
            gender: "الجنس",
            lastName: "الإسم العائلي",
            location: "الموقع",
            main: "الخدمة الرئيسية",
            members: "الأعضاء",
            message: "الرسالة",
            meetings: "الاجتماعات",
            office: "المكتب",
            password: "كلمة السر",
            patente: "Patente",
            placeOfBirth: "مكان الإزدياد",
            phone: "الهاتف",
            place: "المكان",
            price: "السعر",
            reason: "السبب",
            region: "الجهة",
            role: "الدور",
            sector: "القطاع",
            services: "الخدمات",
            startsAt: "يبدأ في",
            subject: "الموضوع",
            terms: "الأحكام والشروط",
            title: "العنوان",
            type: "النوع",
            userName: "اسم االمستخدم",
            website: "الموقع الالكتروني"
        },
        fields: {
            password: {
                min: "كلمة السر قصيرة جداً سيتم اختراقك",
                required: "كلمة السر مطلوبة"
            }
        }
    }
});
