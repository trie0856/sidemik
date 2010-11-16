<?php defined('SYSPATH') or die('No direct access allowed.');

class Auth_ORM extends Kohana_Auth_ORM {
    /**
	 * Checks if a session is active.
	 *
	 * @param   mixed    role name string, role ORM object, or array with role names
	 * @return  boolean
	 */
	public function logged_in($role = NULL)
	{
		$status = FALSE;

		// Get the user from the session
		$user = $this->get_user();

		if (is_object($user) AND $user instanceof Model_User AND $user->loaded())
		{
			// Everything is okay so far
			$status = TRUE;

			if ( ! empty($role))
			{
				// Multiple roles to check
				if (is_array($role))
				{
					// Check each role
                                        $status = FALSE;
					foreach ($role as $_role)
					{
						if ( ! is_object($_role))
						{
							$_role = ORM::factory('role', array('name' => $_role));
						}

						// If the user doesn't have the role
						if ($user->has('roles', $_role))
						{
							// Set the status false and get outta here
							$status = TRUE;
							break;
						}
					}
				}
				// Single role to check
				else
				{
					if ( ! is_object($role))
					{
						// Load the role
						$role = ORM::factory('role', array('name' => $role));
					}

					// Check that the user has the given role
					$status = $user->has('roles', $role);
				}
			}
		}

		return $status;
	}
}