import './bootstrap';

import App from './logic';
// Mage
import { skillsMage } from './listSkills/Mage.js'; 
import { skillsWizard } from './listSkills/MageWizard.js';
import { skillsWizardHight } from './listSkills/MageWizardHight.js';
import { skillsSage } from './listSkills/MageSage.js';
import { skillsProfessort } from './listSkills/MageProfessor.js';
// Merchant
import { skillsMerchant } from './listSkills/Merchant.js'; 
import { skillsAlchemist } from './listSkills/MerchantAlchemist.js';
import { skillsCreator } from './listSkills/MerchantCreator.js';
import { skillsBlacksmith } from './listSkills/MerchantBlacksmith.js';
import { skillsWhitesmith } from './listSkills/MerchantWhitesmith.js';
// Acolyte
import { skillsAcolyte } from './listSkills/Acolyte.js'; 
import { skillsPriest } from './listSkills/AcolytePriest.js';
import { skillsMonk } from './listSkills/AcolyteMonk.js';
import { skillsHighPriest } from './listSkills/AcolyteHighPriest.js';
import { skillsChampion } from './listSkills/AcolyteChampion.js';
// Swordman
import { skillsSwordman } from './listSkills/Swordman.js'; 
import { skillsCrusader } from './listSkills/SwordmanCrusader.js';
import { skillsPaladin } from './listSkills/SwordmanPaladin.js';
import { skillsKnight } from './listSkills/SwordmanKnight.js';
import { skillsLordKnight } from './listSkills/SwordmanLordKnight.js';
// Thief
import { skillsThief } from './listSkills/Thief.js'; 
import { skillsAssassin } from './listSkills/ThiefAssassin.js';
import { skillsAssassinCross } from './listSkills/ThiefAssassinCross.js';
import { skillsRogue } from './listSkills/ThiefRogue.js';
import { skillsStalker } from './listSkills/ThiefStalker.js';
// Archer
import { skillsArcher } from './listSkills/Archer.js'; 
import { skillsHunter } from './listSkills/ArcherHunter.js';
import { skillsSniper } from './listSkills/ArcherSniper.js';
import { skillsBard } from './listSkills/ArcherBard.js';
import { skillsClown } from './listSkills/ArcherClown.js';
import { skillsDancer } from './listSkills/ArcherDancer.js';
import { skillsGypsy } from './listSkills/ArcherGypsy.js';



// Проверяем, какая страница загружена и загружаем соответствующий js с данными  
window.onload = () => {  
  const page = window.location.pathname.split('/').pop();  
  if (page === 'mageWiz.html') { 
    new App(skillsMage, skillsWizard, skillsWizardHight).logic(); 
  } else if (page === 'mageSage.html') { 
    new App(skillsMage, skillsSage, skillsProfessort).logic();
  } else if (page === 'merchantAlchemist.html') { 
    new App(skillsMerchant, skillsAlchemist, skillsCreator).logic();
  } else if (page === 'merchantBlacksmith.html') { 
    new App(skillsMerchant, skillsBlacksmith, skillsWhitesmith).logic();
  } else if (page === 'acolytePriest.html') { 
    new App(skillsAcolyte, skillsPriest, skillsHighPriest).logic();
  } else if (page === 'acolyteMonk.html') { 
    new App(skillsAcolyte, skillsMonk, skillsChampion).logic();
  } else if (page === 'swordmanCrusader.html') { 
    new App(skillsSwordman, skillsCrusader, skillsPaladin).logic();
  } else if (page === 'swordmanKnight.html') { 
    new App(skillsSwordman, skillsKnight, skillsLordKnight).logic();
  } else if (page === 'thiefAssassin.html') { 
    new App(skillsThief, skillsAssassin, skillsAssassinCross).logic();
  } else if (page === 'thiefRogue.html') { 
    new App(skillsThief, skillsRogue, skillsStalker).logic();
  } else if (page === 'archerHunter.html') { 
    new App(skillsArcher, skillsHunter, skillsSniper).logic();
  } else if (page === 'archerBard.html') { 
    new App(skillsArcher, skillsBard, skillsClown).logic();
  } else if (page === 'archerDancer.html') { 
    new App(skillsArcher, skillsDancer, skillsGypsy).logic();
  }  
};
  