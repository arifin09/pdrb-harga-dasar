<?php namespace Bantenprov\PdrbHargaDasar\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\PdrbHargaDasar\Facades\PdrbHargaDasar;
use Bantenprov\PdrbHargaDasar\Models\PdrbHargaDasarModel;

/**
 * The PdrbHargaDasarController class.
 *
 * @package Bantenprov\PdrbHargaDasar
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class PdrbHargaDasarController extends Controller
{
    public function demo()
    {
        return PdrbHargaDasar::welcome();
    }
}
