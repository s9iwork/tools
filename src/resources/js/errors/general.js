import voca from 'voca';

const errMessageRequired = '%sを入力してください';

// eslint-disable-next-line import/prefer-default-export
export function getRequiredErrorMessage(value) {
  return voca.sprintf(errMessageRequired, value);
}
