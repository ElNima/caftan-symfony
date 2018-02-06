<?php

namespace CAFTAN\AppBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class CAFTANAppBundle extends Bundle
{
        
     public function getParent()
  {
    return 'FOSUserBundle';
  }

}
